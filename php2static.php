<?php 
    // 引数として指定された相対パスを元に静的HTMLをカレントディレクトリに出力していきます。
    mb_internal_encoding("UTF8");

    $convertefiles = array();

    if ($argc != 2)
    {
        echo "パラメータ不正のため終了します\n";
        exit(-1);
    }

    $target = $argv[1];

    // 出力先構成アレイ : 出力先パスをフォルダ名単位で溜めこむ配列
    $arraydist = array();
    // メイン処理呼び出し
    outputStatic($target, $arraydist);

    $outdir = basename($target);
    convertInnerPath($outdir, $convertefiles);

    echo "完了！";
    exit(0);

    /**
     * 静的HTMLを出力します
     * $target : 読み込み元ファイルまたはディレクトリ
     * $arraydist : 出力先構成アレイ
     */
    function outputStatic($target, $arraydist)
    {
        global $convertefiles;

        // 読み込み元の絶対パス取得
        $abpath   = realpath($target);
        // 読み込み元のファイル名またはディレクトリ名
        $filename = basename($abpath);
        // 出力先パス
        $outputpath = toPath($arraydist, $filename);

        // 事前チェック
        if (file_exists($outputpath))
        {
            echo "出力先にファイルが存在するためエラー終了します : " . $outputpath . "\n";
            exit(-1);
        }

        // (A)対象がディレクトリ
        if (is_dir($abpath))
        {
            // ディレクトリは再帰的に作成していきます。
            echo "Copied : " . toPath($arraydist, $filename) . "\n";
            mkdir($outputpath);

            // 再帰的処理
            array_push($arraydist, $filename);

            $handle = opendir($abpath) or exit('NG');
            while ($fname = readdir($handle))
            {
                if ($fname == "." || $fname == "..")
                {
                    continue;
                }
                // 再帰的にファイル処理
                outputStatic($abpath . DIRECTORY_SEPARATOR . $fname, $arraydist);
            }
            array_pop($arraydist);
            return;
        }

        // (B)対象が拡張子なしファイル
        $sp = explode('.', $filename);
        if (count($sp) < 2)
        {
            // コピー
            echo "Copied : " . $outputpath . "\n";
            copy ($abpath, $outputpath);

            // 元ファイルの更新日時を出力先ファイルにタッチする
            $tm = filemtime($abpath);
            touch($outputpath, $tm);

            return;
        }

        // (C)対象がPHP以外のファイル
        $ext = $sp[1];
        if ($ext != "php")
        {
            // コピー
            echo "Copied : " . $outputpath . "\n";
            copy ($abpath, $outputpath);

            // 元ファイルの更新日時を出力先ファイルにタッチする
            $tm = filemtime($abpath);
            touch($outputpath, $tm);

            return;
        }

        // (D)PHPコードを静的HTMLに書き出し
        {
            $outname = str_replace(".php", ".html", $filename);
            echo "Changed: " . toPath($arraydist, $outname) . "\n";
            $out1path = toPath($arraydist, $outname);
            exec('php "' . $abpath . '" > "' . $out1path . '"');

            // 元ファイルの更新日時を出力先ファイルにタッチする
            $tm = filemtime($abpath);
            touch($out1path, $tm);

            // $convertefiles : パス置き換え用に配列保存
            array_push($convertefiles, $filename);
        }
    }

    /**
     * ファイル中のパスを変換(.php -> .html)
     */
    function convertInnerPath($target, $convertefiles)
    {
        // 読み込み元の絶対パス取得
        $abpath   = realpath($target);

        // (A)対象がディレクトリ
        if (is_dir($abpath))
        {
            $handle = opendir($abpath) or exit('NG');
            while ($fname = readdir($handle))
            {
                if ($fname == "." || $fname == "..")
                {
                    continue;
                }
                // 再帰的にファイル処理
                convertInnerPath($abpath . DIRECTORY_SEPARATOR . $fname, $convertefiles);
            }
            return;
        }

        // ファイルを読み込み > .phpとなっているパスを.htmlに置き換え > ファイルを再書き込み
        $converted = false;
        $str = file_get_contents($abpath);
        foreach ($convertefiles as $tgtpath)
        {
            $strv = str_replace($tgtpath, str_replace(".php", ".html", $tgtpath), $str);
            if ($strv != $str)
            {
                $converted = true;
                $str = $strv;
            }
        }

        if ($converted)
        {
            echo "Convert:" . $abpath . "\n";
            $tm = filemtime($abpath);
            file_put_contents($abpath, $str);
            touch($abpath, $tm);
        }
    }

    /**
     * ユーティリティ：パス文字列にして返します
     */
    function toPath($arraydist, $outname = null)
    {
        $path = implode(DIRECTORY_SEPARATOR, $arraydist);
        if (isset($outname)) {
            if (strlen($path) > 0) {
                return $path . DIRECTORY_SEPARATOR . $outname;
            }
            else {
                return $outname;
            }
        }
        else {
            return $path;
        }
    }
?>
