<h1>Agenda(s)</h1>

<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>

            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($agenda as $a) {
            echo '<tr>';
            echo "<td>" . $a['id'] . "</td>";
            echo "<td>" . $a['yesterday'] . "</td>";
            echo "<td>" . $a['today'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>