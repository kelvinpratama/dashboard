<div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr>
            <th>Merchant Name</th>
            <th>Transmission Date Time</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaction as $transaction)
            <tr class="gradeA">
                <td>
                    {{$transaction->merchant_name}}
                </td>
                <td>
                    {{$transaction->transmission_date_time}}
                </td>
                <td>
                    {{$transaction->amount}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>