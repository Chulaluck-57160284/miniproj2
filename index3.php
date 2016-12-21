<html>
<head>
<link type="text/css" rel="stylesheet" href="css_layout.css">
<style>
    * { margin: 0; padding: 0; }
    #all{ width:980px; height:100%; margin:0px auto; position:relative; }
    #header{ background-color:#ec8000; height:100px; padding:8px; }
    #left{ background-color:#80ec00; height:100%; width:200px; position:absolute;}
    #content{ position:absolute; margin:0 250px 0 200px; padding:8px; }
    #right{ background-color:#8080ec; height:100%; width:250px; position:absolute; right:0; }
    #footer{ position:absolute; background-color:#808080; height:100px; text-align:center; bottom:-120px; width:100%; }

            #all{ 
            width:100%;
            height:100%; 
            margin:0px auto; 
            position:relative; 
        }
        #header{ 
            background-color:#4E607A; 
            height:100px; 
            padding:8px; 
        }
        #content{ 
            position:absolute;  
            padding:8px;
            height:100%; 
            width:950px; 
        }
        #right{ 
            height:100%; 
            width:250px; 
            position:absolute; 
            right:0; }
        #footer{ 
            position:absolute; 
            background-color:#1A1D21; 
            height:50px; 
            text-align:center; 
            bottom:-140px; 
            width:100%; 
            color:white;
            font-size: 10pt;
        }
        
</style>
</head>
<body>
<div id="all">
    <div id="header"><h1>CSS&amp;HTML&nbsp;Layout</h1></div>
    <div id="left"><b>This is left side.</b>    
    </div>  
     <div id="content">
           <p>การจัดวางโครงสร้าง (Layout) ของเว็บ ถือเป็นจุดเริ่มต้นและจุดสำคัญมากในการออกแบบ ก่อนที่จะสร้างส่วนอื่นๆ เว็บโปรแกรมเมอร์ส่วนใหญ่มักออกแบบเค้าโครงของเว็บเพจไว้ก่อนเสมอ จากนั้นจึงกำหนดโครงสร้างอื่นๆต่อไป
            </p>
            <p>ตัวอย่างนี้ผู้เขียนได้ออกแบบ Layout อย่างคร่าวๆ โดยใช้แท็ก DIV ใน HTML พร้อมกับใช้ CSS ในการจัดการให้ข้อมูลออกมาในรูปแบบที่ต้องการ
            </p>
       </div>
       <div id="right"><b>This is right side.</b></div>
       <div id="footer"><b>This is footer</b></div>
</div>
</body>
</html>