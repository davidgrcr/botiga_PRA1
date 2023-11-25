<div class="admin-home">
    <h2 class="text-start">Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">User Type</th>
                <th scope="col">Date</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach ($orders as $order_id => $order) {
                  echo '<tr>';
                  echo '<th scope="row">' . $order_id . '</th>';
                  echo '<td>' . $order['user_type'] . '</td>';
                  echo '<td>' . $order['order_date'] . '</td>';
                  echo '<td>';
                  echo '<a class="link" href="/admin/order/' . $order_id . '">+ More info</a>';
                  echo '</tr>';
              }
            ?>            
        </tbody>
    </table>
</div>

<style>
    .admin-home {
        margin-top: 100px;
    }
    .admin-home h2 {
        margin-bottom: 50px;
    }
</style>