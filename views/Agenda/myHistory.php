<h1>My history</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>

            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Yesterday</th>
                <th>Today</th>
                <th>Problems</th>
            </tr>
        </thead>
        <?php

        foreach ($myHistory as $a) {
            echo '<tr>';
            echo "<td>" . $a['id'] . "</td>";
            echo "<td>" . $a['date'] . "</td>";
            echo "<td>" . $a['yesterday'] . "</td>";
            echo "<td>" . $a['today'] . "</td>";
            echo "<td>" . $a['problems'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>
</div>