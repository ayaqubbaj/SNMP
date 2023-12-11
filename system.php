<?php
if (isset($_POST['location']))
{
    snmp2_set("localhost","public",".1.3.6.1.2.1.1.6.0","s",$_POST['location']);
}
if (isset($_POST['contact']))
{
    snmp2_set("localhost","public",".1.3.6.1.2.1.1.4.0","s",$_POST['contact']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>System</title>
    <style>
    body,html {
        margin:0;
        padding:0;
        background-color:#f2d2d5; 
        color: #333; 
    }
    header {
        width:100%;
        height:70px;
        background-color: #696263;
    }
    h1 {
        position:absolute;
        padding:3px;
        float:left;
        margin-left:2%;
        margin-top:10px;
        color:white;
    }
    ul {
        width:auto;
        float:right;
        margin-top:8px;
    }
    li {
        display:inline-block;
        padding:15px 30px;
        height:100%;
    }
    a {
        text-align:center;
        color:#ffffff;
        text-decoration:none;
        font-size:1.2vw;
    }
    a:hover {
        color:#d66b76;
        transition:0.7s;
    }
    .active {
        color:#d66b76;
    }
    .div1 {
        border-radius: 5px;
        background-color: #d66b76;
        padding: 20px;
        align:center;
    }
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=submit] {
        width: 100%;
        background-color:#696263;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #552a2f;
    }
    #Table { 
        border-collapse: collapse;
        width: 100%;
        border-radius: 4px;
        cursor: pointer;
    }
    #Table td, #Table th {
        border: 1px solid black;
        padding: 8px;
    }
    #Table tr:nth-child(even){
        background-color: #d66b76;
    }
    #Table tr:hover {
        background-color: #d66b76;
    }
    #Table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: white;
        background-color:gray;
        border-color:white;
        text-align:center;
    }
    </style>
</head>
<body>
<header>
    <h1>SNMP</h1>
    <nav>
        <ul>
            <li class="active">
                <a href="system.php" class="active"> System </a>
            </li>
            <li>
                <a href="udp.php">UDP</a>
            </li>
            <li>
                <a href="arp.php">ARP</a>
            </li>
            <li>
                <a href="tcp.php">TCP</a>
            </li>
        </ul>
    </nav>
</header>
<div style="margin-left:25%;padding:1px 16px;height:800px;width:50%;">

    <h3 align="center">Change System Group information</h3>
    <div class="div1">
        <form action="System.php" method="post">
            <table style="margin-left:25%;">
                <tr>
                    <td><label for="contact">System Contact</label></td>
                    <td><input type="text" id="contact" name="contact" placeholder="System Contact"></td>
                </tr>
                <tr>
                    <td><label for="location">System Location</label></td>
                    <td><input type="text" id="location" name="location" placeholder="System Location"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>        
        </form>
    </div>
    
    <?php
     $desc = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.1.0");
     $id = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.2.0");
     $time=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.3.0");
     $contact=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.4.0");
     $name=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.5.0");
     $location=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.6.0");
     $services=snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.7.0");
    ?>


    <div style="height:300px;width:100%;">
        <h3 align="center">System Group</h3>
        <table id="Table">
             <tr>
                <th>Information about</th>
                <th>Information</th>
            </tr>
            <tr>
                <td>SysDesc</td>
                <td><?php echo $desc?></td>
            </tr>
            <tr>
                <td>SysObjectID</td>
                <td><?php echo $id?></td>
            </tr>
            <tr>
                <td>SysUpTime</td>
                <td><?php echo $time?></td>
            </tr>
            <tr>
                <td>SysContact</td>
                <td><?php echo $contact?></td>
            </tr>
            <tr>
                <td>SysName</td>
                <td><?php echo $name?></td>
            </tr>
            <tr>
                <td>SysLocation</td>
                <td><?php echo $location?></td>
            </tr>
            <tr>
                <td>SysServices</td>
                <td><?php echo $services?></td>
            </tr>

        </table>
    </div>

</body>
</html>
