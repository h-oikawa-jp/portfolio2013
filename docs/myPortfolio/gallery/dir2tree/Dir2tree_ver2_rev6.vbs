'On Error Resume Next
Set Fs = WScript.CreateObject("Scripting.FileSystemObject")
Set Shell = WScript.CreateObject("Shell.Application")



'���������������������Ώۃf�B���N�g���A�t�@�C���w�聁������������������

'�c���[�����郋�[�g�t�H���_��ݒ�
Dim sRootDir,oRootDir,Confirm
If WScript.Arguments.Count>0 Then
    sRootDir=WScript.Arguments(0)
End If
If Fs.FolderExists(sRootDir) Then
	Set oRootDir = Shell.NameSpace(sRootDir)
Else
	Set oRootDir = Shell.BrowseForFolder(0,"���[�g�t�H���_�̑I��",0)
	If TypeName(oRootDir)="Nothing" Then WScript.Quit
End If
Confirm= MsgBox ( oRootDir & " �ȉ��̃t�H���_�\�����c���[�����܂�" , vbOKCancel , "�m�F" )
If Confirm=2 then WScript.Quit


'���[�g�t�H���_�𔻕�
Dim RootPath,DLetter,sFileName
If Fs.FolderExists(oRootDir.Items.Item.Path) Then
	Set FsGt=Fs.GetFolder(oRootDir.Items.Item.Path)
	If FsGt.IsRootFolder Then 
		Set FsGt=Fs.GetDrive(oRootDir.Items.Item.Path)
		RootPath=FsGt.RootFolder.Path
		DLetter=FsGt.DriveLetter
		If FsGt.VolumeName="" Then
			sFileName=DLetter & "_Drive"
		Else
			sFileName=FsGt.VolumeName
		End If
	Else
		RootPath=oRootDir.Items.Item.Path
		sFileName=oRootDir.Title
	End If
Else
	MsgBox "�p�X���s���ł��B(" & oRootDir.Items.Item.Path & ")"
	WScript.Quit
End If




'�o�͐�HTML�Z�b�g
Dim sOutFile
sOutFile=sFileName & ".html"
sOutFile=Fs.BuildPath(Fs.GetParentFolderName(WScript.ScriptFullName), sOutFile)
Set ts=Fs.CreateTextFile(sOutFile,True)




'����������������������������HTML�̓��e���������݁�������������������

'�w�b�_�`�^�C�g�������̏�������
WriteHead sFileName
'�uWriteHead�v���[�`���� ��

If TypeName(DLetter)<>"Empty" Then 
	ts.WriteLine "Volume Label: " & FsGt.VolumeName & "<br>"
	ts.WriteLine "File System : " & FsGt.FileSystem & "<br>"
End If
ts.WriteLine "Folder Path : " & RootPath & "<br>"
ts.WriteLine "Total Size  : " & GetSize(RootPath) & "Byte</FONT><br>"

'�O�ナ���N�A�V�X�e���t�@�C���\���ݒ�A�S�c���[�J�{�^���̏�������
ts.WriteLine "<DIV id=""PrvNxt_0"" align=""center"" style=""display:none"">"
ts.WriteLine "<a href=""javaScript:PrNxLnk(-1)"">&lt;&lt;&nbsp;prev&nbsp;</a>�@�@�@�@�@<a href=""javaScript:PrNxLnk(1)"">&nbsp;next&nbsp;&gt;&gt;</a></div>"
ts.WriteLine "<HR size=""1"">"
ts.WriteLine "<DIV id=""sysSelect"" style=""display:none"">"
ts.WriteLine "<input type=""radio""name=""systemOnOff""onClick=""javaScript:sysOnOff(1)""checked>�V�X�e���t�@�C����\��<br>"
ts.WriteLine "<input type=""radio""name=""systemOnOff""onClick=""javaScript:sysOnOff(0)"">�V�X�e���t�@�C�����\��<br>"
ts.WriteLine "</DIV><br>"
ts.WriteLine "��S�Ẵc���[�� <input type=""button""value="" �W�J���� ""onclick=""javaScript:treeAllOpCl(1)""> <input type=""button""value="" �܂肽���� ""onclick=""javaScript:treeAllOpCl(0)""><br><br>"


'��������c���[�o�̓��C������
Dim D(),FDepth,dLine,sLine
FDepth=0
ReDim D(FDepth)
D(FDepth)=0
ts.WriteLine "<TABLE><DIV class=""table"">"
ts.WriteLine "<A href=""javaScript:treeMenu('treeMenu0')"">�@<span id=""f_treeMenu0"">1</span>" & oRootDir & "</a><br>"

Search RootPath

'�������� �� �f�B���N�g�������A�uSearch�v���[�`���� �� ��������





'HTML������������
ts.WriteLine "</DIV></TABLE>"
ts.WriteLine "<br><HR size=""1"">"
ts.WriteLine "<DIV id=""PrvNxt_1"" align=""center"" style=""display:none"">"
ts.WriteLine "<a href=""javaScript:PrNxLnk(-1)"">&lt;&lt;&nbsp;prev&nbsp;</a>�@�@�@�@�@<a href=""javaScript:PrNxLnk(1)"">&nbsp;next&nbsp;&gt;&gt;</a></div>"
ts.Write "<BR><BR><BR><BR>" & vbCrLf & "</BODY>" & vbCrLf & "</HTML>"

'�I������
ts.Close
WScript.Echo "�I��"
WScript.Quit


'�����������������������C�����[�`�������܂Ł�������������������





'Search ���[�`��
Sub Search(obj)
	Set oFolder=Fs.GetFolder(obj)
	Dim I
	I=1
	If FDepth=0 Then
		dLine="<DIV id=""treeMenu0"" class=""tree"" style=""display:block"">"
	Else
		dLine="<DIV id=""treeMenu" & Join(D,"-") & """ class=""tree"" style=""display:none"">"
	End If
	ts.WriteLine dLine
	ReDim Preserve D(FDepth)
	For Each child In oFolder.SubFolders
		Dim System
		Set cFolder=Fs.GetFolder(child.Path)
		D(FDepth)=I
		If (cFolder.Attributes And 4) > 0 Then
			ts.Write "<A class=""system"">"
			tmp= "<span>></span>" & child.Name & "�@�@�@!!�V�X�e���t�H���_!!<br></A>"
			System=TRUE
		Else
			tmp= "<A href=""javaScript:treeMenu('treeMenu" & Join(D,"-") & "')"">"
			tmp= tmp & "<span id=""f_treeMenu" & Join(D,"-") & """>0</span>" & child.Name & "</a>"
			tmp= tmp & "�@�@�@" & GetSize(child.Path) & "Byte</FONT><br>"
		End If
		If I=oFolder.SubFolders.Count+oFolder.Files.Count Then
			ts.WriteLine sLine & "�@��"  & tmp
			If Not System Then sLine=sLine & "�@�@�@"
		Else
			ts.WriteLine sLine & "�@��"  & tmp
			If Not System Then sLine=sLine & "�@�� "
			I=I+1
		End If
		If System Then
			System=0
		Else
			FDepth=FDepth+1
			Search child
		End If
	Next
	For Each child In oFolder.Files
		Set cFile=Fs.GetFile(child.Path)
		If (cFile.Attributes And 4) > 0 Then
			ts.Write "<A class=""system"">"
			tmp= "<span>></span>" & child.Name & "�@�@�@!!�V�X�e���t�@�C��!!<br></A>"
		Else
			tmp= "<span>3</span>" & child.Name
			tmp= tmp & "�@�@�@" & GetSize(child.Path) & "Byte</FONT><br>"
		End If
		If I=oFolder.SubFolders.Count+oFolder.Files.Count Then
			ts.WriteLine sLine & "�@��"  & tmp
		Else
			ts.WriteLine sLine & "�@��"  & tmp
			I=I+1
		End If
	Next
	ts.WriteLine "</DIV>"
	If Len(sLine)>0 Then
		sLine=Left(sLine,Len(sLine)-3)
	End If
	FDepth=FDepth-1
	ReDim Preserve D(FDepth)
End Sub

'�������������� ���uSearch�v�����A�I�������� �� ����������������









'�T�C�Y�擾�T�u���[�`��
Function GetSize(Target)
Dim L,S
If Fs.FileExists(Target) Then
	Set FsGt=Fs.GetFile(Target)
	S=FsGt.Size
ElseIf Fs.FolderExists(Target) Then
	Set FsGt=Fs.GetFolder(Target)
	If FsGt.IsRootFolder Then 
		Set FsGt=Fs.GetDrive(Target)
		S=FsGt.TotalSize
	Else
		S=FsGt.Size
	End If
Else
	MsgBox "�p�X���s���ł��B(" & Target & ")"
	WScript.Quit
End If
L=0
S=CDbl(S)
Do While S>=1024
	S=S/1024
	L=L+1
Loop
S=FormatNumber(S,2)
Select Case L
	Case 0 GetSize="<FONT color=""#6495ed"">" & S & " "
	Case 1 GetSize="<FONT color=""#dda520"">" & S & " K"
	Case 2 GetSize="<FONT color=""#2e8b57"">" & S & " M"
	Case 3 GetSize="<FONT color=""#ff6347"">" & S & " G"
	Case 4 GetSize="<FONT color=""#8b0000"">" & S & " T"
	Case Else GetSize="<FONT color=""#696969"">" & S & " ?"
End Select
End Function











'�w�b�_�������݃��[�`��
Sub WriteHead(Title)
ts.WriteLine "<HTML><HEAD>"
ts.WriteLine "<META http-equiv=""Content-Type"" content=""text/html; charset=shift_jis"">"
ts.WriteLine "<TITLE>[" & Title & "]�c���[���X�g</TITLE>"
ts.WriteLine "<STYLE TYPE=""text/css"">"
ts.WriteLine "a:link	{text-decoration:none;}"
ts.WriteLine "a:visited	{text-decoration:none;}"
ts.WriteLine "a:active	{text-decoration:none;}"
ts.WriteLine "a:hover	{text-decoration:none;}"
ts.WriteLine ".system	{color: #bababa;}"
ts.WriteLine "span	{font-family:wingdings;}"
ts.WriteLine "div.tree	{"
ts.WriteLine "	border: solid;"
ts.WriteLine "	border-width: 0px 1px 1px 0px;"
ts.WriteLine "	border-color: c0c0c0;"
ts.WriteLine "	padding-right: 1em;"
ts.WriteLine "	margin-right: 1em;"
ts.WriteLine "	padding-bottom: 2px;"
ts.WriteLine "	margin-bottom: 5px;"
ts.WriteLine "}"
ts.WriteLine "div.table	{"
ts.WriteLine "	border: solid;"
ts.WriteLine "	border-width: 1px 1px 1px 1px;"
ts.WriteLine "	border-color: c0c0c0;"
ts.WriteLine "	padding-right: 1em;"
ts.WriteLine "	padding-bottom: 2px;"
ts.WriteLine "}"
ts.WriteLine "</STYLE>"
ts.WriteLine "<SCRIPT TYPE=""text/javascript""><!--"
ts.WriteLine "if (document.all)"
ts.WriteLine "	document.write('<style type=""text/css""> .tree { display: none; }<'+'/style>');"
ts.WriteLine "// �c���[���j���[ �t�H���_�J��"
ts.WriteLine "function treeMenu(tName){"
ts.WriteLine "	if(document.all){"
ts.WriteLine "		tMenu=document.all(tName).style;"
ts.WriteLine "		Icon=document.all(""f_""+tName);"
ts.WriteLine "	}else{"
ts.WriteLine "		tMenu=document.getElementById(tName).style;"
ts.WriteLine "		Icon=document.getElementById(""f_""+tName);"
ts.WriteLine "	}"
ts.WriteLine "	if(tMenu.display=='block'){"
ts.WriteLine "		tMenu.display=""none"";"
ts.WriteLine "		Icon.innerHTML=""0"";"
ts.WriteLine "	}else{"
ts.WriteLine "		tMenu.display=""block"";"
ts.WriteLine "		Icon.innerHTML=""1"";"
ts.WriteLine "	}"
ts.WriteLine "}"
ts.WriteLine "// �S�c���[�ꊇ�J��"
ts.WriteLine "function treeAllOpCl(D) {"
ts.WriteLine "	var el=document.getElementsByTagName('DIV');"
ts.WriteLine "	for (var i=0;i<el.length;i++){"
ts.WriteLine "		if(el[i].className=='tree'){"
ts.WriteLine "			if(D){"
ts.WriteLine "				el[i].style.display = ""block"";"
ts.WriteLine "			}else{"
ts.WriteLine "				el[i].style.display = ""none"";"
ts.WriteLine "			}"
ts.WriteLine "		}"
ts.WriteLine "	}"
ts.WriteLine "	var el=document.getElementsByTagName('span');"
ts.WriteLine "	for (var i=0;i<el.length;i++){"
ts.WriteLine "		if(el[i].innerHTML==0 || el[i].innerHTML==1){"
ts.WriteLine "			el[i].innerHTML=D;"
ts.WriteLine "		}"
ts.WriteLine "	}"
ts.WriteLine "}"
ts.WriteLine "// �V�X�e���t�@�C�����ڂ̗L���A�`�F�b�N�{�b�N�X�\������"
ts.WriteLine "function sysMenu(Id) {"
ts.WriteLine "	var el=document.getElementsByTagName('A');"
ts.WriteLine "	for (var i=0;i<el.length;i++){"
ts.WriteLine "		if(el[i].className=='system'){"
ts.WriteLine "			elem=document.all(Id).style;"
ts.WriteLine "			elem.display = ""block"";"
ts.WriteLine "			break;"
ts.WriteLine "		}"
ts.WriteLine "	}"
ts.WriteLine "}"
ts.WriteLine "// �V�X�e���t�@�C���\��OnOff"
ts.WriteLine "function sysOnOff(D) {"
ts.WriteLine "	var el=document.getElementsByTagName('A');"
ts.WriteLine "	for (var i=0;i<el.length;i++){"
ts.WriteLine "		if(el[i].className=='system'){"
ts.WriteLine "			if(D){"
ts.WriteLine "				el[i].style.display = ""block"";"
ts.WriteLine "			}else{"
ts.WriteLine "				el[i].style.display = ""none"";"
ts.WriteLine "			}"
ts.WriteLine "		}"
ts.WriteLine "	}"
ts.WriteLine "}"
ts.WriteLine "// �A�ԃ����N�\������"
ts.WriteLine "function PrNxDsp(str) {"
ts.WriteLine "	str=str.substring(str.lastIndexOf('/',str.length) +1,str.lastIndexOf('.'));"
ts.WriteLine "	if (str.match(/[0-9]+/)) {"
ts.WriteLine "		for (var i=0;i<2;i++){"
ts.WriteLine "			var el=document.getElementById(""PrvNxt_"" + i);"
ts.WriteLine "			el.style.display = ""block"";"
ts.WriteLine "		}"
ts.WriteLine "		FileName = new Array(3);"
ts.WriteLine "		FileName[0] = RegExp.leftContext"
ts.WriteLine "		FileName[1] = RegExp.lastMatch"
ts.WriteLine "		FileName[2] = RegExp.rightContext"
ts.WriteLine "	}"
ts.WriteLine "}"
ts.WriteLine "// �A�ԃ����N��w��A�W�����v"
ts.WriteLine "function PrNxLnk(num) {"
ts.WriteLine "	var FileNum = FileName[1] - 0 + num"
ts.WriteLine "	var Count = FileName[1].length - String(FileNum).length"
ts.WriteLine "	for (var i=0;i<Count;i++){"
ts.WriteLine "		FileNum = ""0"" + String(FileNum)"
ts.WriteLine "	}"
ts.WriteLine "	location.href = ""./"" + FileName[0] + FileNum + FileName[2] + "".html"""
ts.WriteLine "}"
ts.WriteLine "//--></SCRIPT></HEAD>"
ts.WriteLine "<BODY bgcolor=""#f3f3ff"" onLoad=""sysMenu('sysSelect');PrNxDsp(location.pathname)"">"
End Sub
