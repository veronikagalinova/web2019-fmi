

<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <tr>
                <th>Username</th>
                <th>Select Project</th>
            </tr>
        </thead>
        <?php

        foreach ($users as $u) {
            echo '<form method="post" action="">';
            echo '<tr>';
            //todo make username readonly
            echo '<td><input type="text" name="user" class="form-control-plaintext" value="' . $u['username'] . '" readonly></td>';
            //echo "<td>" . $u['project_name'] . "</td>";
            echo '<td>';
            echo '<select class="form-control" name="project">';
            //foreach project
                foreach($projects as $p) {
                    if($p['name']===$u['project_name']) 
                    {
                        echo '<option value="'.$p['name'] .'" selected>'.$p['name'].'</option>';
                    }
                    else
                    {
                        echo '<option value="'.$p['name'] .'">'.$p['name'].'</option>';
                    }
                    
                }
            echo '</select>';
            echo '</td>';
            echo '<td><input type="submit" class="btn btn-primary btn-xs pull-right" name="edit-user-project" value="Update project" ></td>';
            echo "</tr>";
            echo '</form>';
        }
        ?>
    </table>
</div>