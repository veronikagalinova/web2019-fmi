

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
            echo '<form>';
            echo '<tr>';
            //todo make username readonly
            echo "<td>" . $u['username'] . "</td>";
            //echo "<td>" . $u['project_name'] . "</td>";
            echo '<td>';
            echo '<select class="form-control" name="projects">';
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
            echo '<td><button class="btn btn-primary btn-xs pull-right"><b>+</b> Update project</button></td>';
            echo "</tr>";
            echo '</form>';
        }
        ?>
    </table>
</div>