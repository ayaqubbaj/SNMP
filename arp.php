<!DOCTYPE html>
<html>
<head>
    <title>ARP</title>
    <style>
       	body,html{
		margin:0;
		padding:0;
        background-color:#f2d2d5; 

	}
	header{
		width:100%;
		height:70px;
		background-color:#696263;
	}
	h1{
		position:absolute;
		padding:3px;
		float:left;
		margin-left:2%;
		margin-top:10px;
		color:white;
	}
	ul{
		width:auto;
		float:right;
		margin-top:8px;
	}
	li{
		display:inline-block;
		padding:15px 30px;
		height:100%;
	}
	a{
		text-align:center;
		color:#ffffff;
		text-decoration:none;
		font-size:1.2vw;
	}
	a:hover{
		color:#d66b76;
		transition:0.7s;
	}
    .active{
		color:#d66b76;
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

    #Table tr:nth-child(even){background-color: #d66b76;}

    #Table tr:hover {background-color: #ab555e;}

    #Table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: white;
			background-color:#696263;
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
                <li>
                    <a href="system.php"> System </a>
                </li>
                <li>
                    <a href="udp.php">UDP</a>
                </li>
				<li class="active">
                    <a href="arp.php" class="active">ARP</a>
                </li>
                <li>
                    <a href="tcp.php">TCP</a>
                </li>
            </ul>
</nav>
</header>
<?php
$ipNetToMediaIfIndex = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.1");
$ipNetToMediaPhysAddress= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.2");
$ipNetToMediaNetAddress = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.3");
$ipNetToMediaType= snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.4");
?>
<div style="margin-left:25%;padding:1px 16px;width:50%;">
        <h3 align="center">ARP (ipNetToMediaTable)</h3>

        <table id="Table">
            <tr>
            <th>Index</th>
            <th>MAC</th>
			<th>IP</th>
			<th>Type</th>

            </tr>

            <?php
            for($i = 0; $i < count($ipNetToMediaIfIndex); $i++)
            {
                ?>
                <tr>
                    <td style="text-align:center;"><?php echo $i?></td>
                    <td><?php echo $ipNetToMediaPhysAddress[$i]?></td>
					<td><?php echo $ipNetToMediaNetAddress[$i]?></td>
                    <td style="text-align:center;"><?php echo $ipNetToMediaType[$i]?></td>
                </tr>


                <?php
            }
            ?>

        </table>
 </div>

</body>
</html>