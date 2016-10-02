
table.attablePdf {border-spacing: 0; width:100%}
table.attablePdf {
	width:100%;
	margin:0 auto;
	background: #FFF;
	font-family: DejaVuSans;
	border: 1px solid #ccc;
	font-size: 8px;

}
table.attablePdf th.th{
	padding:5px;
	font-size:14px;
	border-left: 1px solid #ccc;
	border-bottom: 1px solid #ccc;
	
}
table.attablePdf tr td.td{
	padding:8px 5px;
	font-size:12px;
	border-bottom:1px solid #ddd;
	border-left: 1px solid #ccc;
}

table.attablePdf th.info{
	font-size:15px;
	
}
div.pdf h1{
	font-size:15;
	text-align:center;
	padding:0 0 10px 0;
}

div.pdf h2{
	font-size:14px;
	text-align:center;
	padding:0 0 10px 0;
}

div.pdf > table td, th{padding: 0;}

div.pdf table tr th {
	font-size: 12px;
	font-family: DejaVuSans;
}

div.pdf table tr td {
	font-size: 10px;
	font-family: DejaVuSans;
}

div.pdf table tr.topBar th{
	width:100px;
	height:6px;
}

div.pdf table tr.topBar th:nth-child(1){background:#FF9800;}
div.pdf table tr.topBar th:nth-child(2){background:#CDDC39;}
div.pdf table tr.topBar th:nth-child(3){background:#03A9F4;}
div.pdf table tr.topBar th:nth-child(4){background:#9C27B0;}
div.pdf table tr.topBar th:nth-child(5){background:#FF9800;}
div.pdf table tr.topBar th:nth-child(6){background:#CDDC39;}
div.pdf table tr.topBar th:nth-child(7){background:#03A9F4;}
div.pdf table tr.topBar th:nth-child(8){background:#9C27B0;}

div.pdf h1{
	text-transform:uppercase;
	color:#000;
	font-weight:normal;
	font-size:20px;
	text-align:left;
	font-weight: bold;
	padding:8px 0;
	text-align:center;
	border-bottom:#21529e solid 1px;
	margin-bottom:15px;
}

div.pdf table.record {
	margin:25px 0 0 0;
	border:#fff solid 1px;
}

div.pdf table.record th {
	color:#000;
	font-weight:bold;
	font-size:13px;
	text-align:left;
	padding:8px 8px;
	background:#21529e;
	color:#fff;
	border:#fff solid 1px;
}

div.pdf table.record td {
	line-height:18px;
	color:#000;
	font-weight:normal;
	font-size:11px;
	text-align:left;
	padding:12px 8px;
	background:#e8e9ee;
	color:#000;
	border:#fff solid 1px;
	text-align: center;
}

div.pdf table.record tr.description td {
	text-align: justify;
    text-justify: inter-word;
    font-size:9px;
}

div.pdf table.record tr.devider td {
	background:#fff;
	padding: 0;
	line-height:8px;
	text-align: justify;
}