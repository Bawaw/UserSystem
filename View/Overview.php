<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="/UserApplication/css/bootstrap.min.css" rel="stylesheet">
        <title>Overview</title>
    </head>
    <body>
        <div>
        <div style="width: 1160px; font-size: 20px;margin: auto; margin-top: 100px; margin-left: -1200;">
            <div class = "form-group">
                 <ul>
             <?php if($this != NULL){ 
                        for($i = 0; $i < count($this->_messages); $i++){?>
                     <li style="color: purple;"> <?php echo $this->_messages[$i];  ?> </li>
             <?php      }     
                    
                    } ?> 
                 </ul>
             </div>   
            
        <div>
        <p><a id="editLink" href = "index.php?action=RequestEditUser" style="float:left">Change settings</a><a id="logoutLink"  href = "index.php?action=Logout" style="float:right">Log Out</a></p>
        </div>
                <table class = "table-striped">
                    <tr style="margin-bottom: 10px;">
                    <th style="padding-right: 220px;">user id</th>
                    <th style="padding-right: 220px;">user name</th>
                    <th style="padding-right: 220px;">Value</th>
                    <th style="padding-right: 220px;"></th>
                </tr>
            <?php for($i = 0; $i < count($this->_users); $i++){ ?>
            <tr>
                <td style="padding-right: 220px;"><?php echo $this->_users[$i]->getUserID(); ?></td>
                <td style="padding-right: 220px;"><?php echo $this->_users[$i]->getUsername(); ?></td>
                <td style="padding-right: 220px;"><?php echo $this->_users[$i]->getValue(); ?></td>
                <td><a href = "index.php?action=Remove&id=<?php echo $this->_users[$i]->getUserID();?>">remove</a></td>
            </tr>
            <?php } ?>
        </table>
                <p><a id="registerLink" href = "index.php?action=RequestRegisterUser">add user</a></p>
        </div>
        </div>
    </body>
</html>
