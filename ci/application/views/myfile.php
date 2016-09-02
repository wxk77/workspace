<html>

<head>
<meta charset="utf-8">

<script for="window" event="onload">

 xmldso.XMLDocument.load("myfile.xml");

</script>

<script language="JavaScript">

function movenext()

{

    if (xmldso.recordset.absoluteposition < xmldso.recordset.recordcount)

	{

	xmldso.recordset.movenext();

	}

	}

function moveprevious()

{

	if (xmldso.recordset.absoluteposition > 1)

	{

	xmldso.recordset.moveprevious();

	}

}

</script>

<TITLE>CD Navigate</TITLE>

</head>

<body>

<p>

<object WIDTH="0" HEIGHT="0"

CLASSID="clsid:550dda30-0541-11d2-9ca9-0060b0ec3d39" ID="xmldso">

</object>

<table>

<tr><td>Title:</td><td><SPAN ID="title" DATASRC=#xmldso DATAFLD="TITLE"></SPAN></td></tr>

<tr><td>Artist:</td><td><SPAN ID="artist" DATASRC=#xmldso DATAFLD="ARTIST"></SPAN></td></tr>

<tr><td>Year:</td><td><SPAN ID="year" DATASRC=#xmldso DATAFLD="YEAR"></SPAN></td></tr>

<tr><td>Country:</td><td><SPAN ID="country" DATASRC=#xmldso DATAFLD="COUNTRY"></SPAN></td></tr>

<tr><td>Company:</td><td><SPAN ID="company" DATASRC=#xmldso DATAFLD="COMPANY"></SPAN></td></tr>

<tr><td>Price:</td><td><SPAN ID="price" DATASRC=#xmldso DATAFLD="PRICE"></SPAN></td></tr>

</table>

<p>

<INPUT TYPE=button VALUE="上一张CD" ONCLICK="moveprevious()">

<INPUT TYPE=button VALUE="下一张CD" ONCLICK="movenext()">

</p>

</body>

</html>