@extends('layouts.dashboardHeader')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Failure Transactions
                    <a href="/exporterrorxls">
                        <button>Export to Excel (XLS)</button>
                    </a>
                    <a href="/exporterrorcsv">
                        <button>Export to Excel (CSV)</button>
                    </a>
                    <a href="/exportToPDFfail">
                        <button>Export to PDF</button>
                    </a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        @if(Auth::user()->role == 'admin')
                            <thead>
                            <tr>
                                <th>Merchant Name</th>
                                <th>Transmission Date Time</th>
                                <th>Amount</th>
                                <th>Card Type</th>
                                <th>Card Onus</th>
                                <th>Response Code</th>
                                <th>Response Description</th>
                                <th>Approval Code</th>
                                <th>Card Number</th>
                                <th>MID</th>
                                <th>TID</th>
                                <th>Authorization Response Code</th>
                                <th>Settle Response Code</th>
                                <th>Transaction Type</th>
                                <th>Card Brand</th>
                                <th>System Trace Audit Number</th>
                                <th>Retrieval Reference Number</th>
                                <th>Merchant Code</th>
                                <th>Billing Address State</th>
                                <th>Billing Address City</th>
                                <th>Merchant Type</th>
                                <th>Industry</th>
                                <th>Billing Address Street</th>
                                <th>Account Number</th>
                                <th>Merchant Bank</th>
                                <th>Merchant Active</th>
                                <th>Refered By</th>
                                <th>Operator Id</th>
                                <th>Operator Name</th>
                                <th>Operator Active</th>
                                <th>Perm View All History</th>
                                <th>Pin Block</th>
                                <th>Permission</th>
                                <th>Perm Manage Operators</th>
                                <th>Auto Statement Daily</th>
                                <th>Auto Statement Weekly</th>
                                <th>Auto Statement Weekly Dow</th>
                                <th>Auto Statement Monthly</th>
                                <th>Base Transaction</th>
                                <th>Loyalty</th>
                                <th>Instalment</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>IP Address</th>
                                <th>Serial Number</th>
                                <th>Device Type</th>
                                <th>Device Active</th>
                                <th>Product ID</th>
                                <th>VDI Date Transaction</th>
                                <th>VDI Day</th>
                                <th>VDI Week</th>
                                <th>VDI Month</th>
                                <th>VDI Quarter</th>
                                <th>VDI Year</th>
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
                                    <td>
                                        {{$transaction->card_type}}
                                    </td>
                                    <td>
                                        {{$transaction->card_onus}}
                                    </td>
                                    <td>
                                        {{$transaction->response_code}}
                                    </td>
                                    <td>
                                        {{$transaction->response_description}}
                                    </td>
                                    <td>
                                        {{$transaction->approval_code}}
                                    </td>
                                    <td>
                                        {{$transaction->card_number}}
                                    </td>
                                    <td>
                                        {{$transaction->mid}}
                                    </td>
                                    <td>
                                        {{$transaction->tid}}
                                    </td>
                                    <td>
                                        {{$transaction->authorisation_response_code}}
                                    </td>
                                    <td>
                                        {{$transaction->settle_response_code}}
                                    </td>
                                    <td>
                                        {{$transaction->transaction_type}}
                                    </td>
                                    <td>
                                        {{$transaction->card_brand}}
                                    </td>
                                    <td>
                                        {{$transaction->system_trace_audit_number}}
                                    </td>
                                    <td>
                                        {{$transaction->retrieval_reference_number}}
                                    </td>
                                    <td>
                                        {{$transaction->merchant_code}}
                                    </td>
                                    <td>
                                        {{$transaction->billing_address_state}}
                                    </td>
                                    <td>
                                        {{$transaction->billing_address_city}}
                                    </td>
                                    <td>
                                        {{$transaction->merchant_type}}
                                    </td>
                                    <td>
                                        {{$transaction->industry}}
                                    </td>
                                    <td>
                                        {{$transaction->billing_address_street}}
                                    </td>
                                    <td>
                                        {{$transaction->account_number}}
                                    </td>
                                    <td>
                                        {{$transaction->merchant_bank}}
                                    </td>
                                    <td>
                                        {{$transaction->merchant_active}}
                                    </td>
                                    <td>
                                        {{$transaction->referred_by}}
                                    </td>
                                    <td>
                                        {{$transaction->operator_id}}
                                    </td>
                                    <td>
                                        {{$transaction->operator_name}}
                                    </td>
                                    <td>
                                        {{$transaction->operator_active}}
                                    </td>
                                    <td>
                                        {{$transaction->perm_view_all_history}}
                                    </td>
                                    <td>
                                        {{$transaction->pin_block}}
                                    </td>
                                    <td>
                                        {{$transaction->permission}}
                                    </td>
                                    <td>
                                        {{$transaction->perm_manage_operators}}
                                    </td>
                                    <td>
                                        {{$transaction->auto_statement_daily}}
                                    </td>
                                    <td>
                                        {{$transaction->auto_statement_weekly}}
                                    </td>
                                    <td>
                                        {{$transaction->auto_statement_weekly_dow}}
                                    </td>
                                    <td>
                                        {{$transaction->auto_statement_monthly}}
                                    </td>
                                    <td>
                                        {{$transaction->base_transaction}}
                                    </td>
                                    <td>
                                        {{$transaction->loyalty}}
                                    </td>
                                    <td>
                                        {{$transaction->instalment}}
                                    </td>
                                    <td>
                                        {{$transaction->longitude}}
                                    </td>
                                    <td>
                                        {{$transaction->latitude}}
                                    </td>
                                    <td>
                                        {{$transaction->ip_address}}
                                    </td>
                                    <td>
                                        {{$transaction->serial_number}}
                                    </td>
                                    <td>
                                        {{$transaction->device_type}}
                                    </td>
                                    <td>
                                        {{$transaction->device_active}}
                                    </td>
                                    <td>
                                        {{$transaction->product_id}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_date_transaction}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_day}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_week}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_month}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_quarter}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_year}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                        @if(Auth::user()->role == 'merchant')
                            <thead>
                            <tr>
                                <th>Merchant Name</th>
                                <th>Transmission Date Time</th>
                                <th>Amount</th>
                                <th>Card Type</th>
                                <th>Card Onus</th>
                                <th>Response Code</th>
                                <th>Response Description</th>
                                <th>Approval Code</th>
                                <th>Card Number</th>
                                <th>MID</th>
                                <th>TID</th>
                                <th>Authorization Response Code</th>
                                <th>Settle Response Code</th>
                                <th>Transaction Type</th>
                                <th>Card Brand</th>
                                <th>System Trace Audit Number</th>
                                <th>Retrieval Reference Number</th>
                                <th>Merchant Code</th>
                                <th>Billing Address State</th>
                                <th>Billing Address City</th>
                                <th>Merchant Type</th>
                                <th>Industry</th>
                                <th>Billing Address Street</th>
                                <th>Account Number</th>
                                <th>Merchant Bank</th>
                                <th>Merchant Active</th>
                                <th>Refered By</th>
                                <th>Operator Id</th>
                                <th>Operator Name</th>
                                <th>Operator Active</th>
                                <th>Perm View All History</th>
                                <th>Pin Block</th>
                                <th>Permission</th>
                                <th>Perm Manage Operators</th>
                                <th>Auto Statement Daily</th>
                                <th>Auto Statement Weekly</th>
                                <th>Auto Statement Weekly Dow</th>
                                <th>Auto Statement Monthly</th>
                                <th>Base Transaction</th>
                                <th>Loyalty</th>
                                <th>Instalment</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>IP Address</th>
                                <th>Serial Number</th>
                                <th>Device Type</th>
                                <th>Device Active</th>
                                <th>Product ID</th>
                                <th>VDI Date Transaction</th>
                                <th>VDI Day</th>
                                <th>VDI Week</th>
                                <th>VDI Month</th>
                                <th>VDI Quarter</th>
                                <th>VDI Year</th>
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
                                    <td>
                                        {{$transaction->card_type}}
                                    </td>
                                    <td>
                                        {{$transaction->card_onus}}
                                    </td>
                                    <td>
                                        {{$transaction->response_code}}
                                    </td>
                                    <td>
                                        {{$transaction->response_description}}
                                    </td>
                                    <td>
                                        {{$transaction->approval_code}}
                                    </td>
                                    <td>
                                        {{$transaction->card_number}}
                                    </td>
                                    <td>
                                        {{$transaction->mid}}
                                    </td>
                                    <td>
                                        {{$transaction->tid}}
                                    </td>
                                    <td>
                                        {{$transaction->authorisation_response_code}}
                                    </td>
                                    <td>
                                        {{$transaction->settle_response_code}}
                                    </td>
                                    <td>
                                        {{$transaction->transaction_type}}
                                    </td>
                                    <td>
                                        {{$transaction->card_brand}}
                                    </td>
                                    <td>
                                        {{$transaction->system_trace_audit_number}}
                                    </td>
                                    <td>
                                        {{$transaction->retrieval_reference_number}}
                                    </td>
                                    <td>
                                        {{$transaction->merchant_code}}
                                    </td>
                                    <td>
                                        {{$transaction->billing_address_state}}
                                    </td>
                                    <td>
                                        {{$transaction->billing_address_city}}
                                    </td>
                                    <td>
                                        {{$transaction->merchant_type}}
                                    </td>
                                    <td>
                                        {{$transaction->industry}}
                                    </td>
                                    <td>
                                        {{$transaction->billing_address_street}}
                                    </td>
                                    <td>
                                        {{$transaction->account_number}}
                                    </td>
                                    <td>
                                        {{$transaction->merchant_bank}}
                                    </td>
                                    <td>
                                        {{$transaction->merchant_active}}
                                    </td>
                                    <td>
                                        {{$transaction->referred_by}}
                                    </td>
                                    <td>
                                        {{$transaction->operator_id}}
                                    </td>
                                    <td>
                                        {{$transaction->operator_name}}
                                    </td>
                                    <td>
                                        {{$transaction->operator_active}}
                                    </td>
                                    <td>
                                        {{$transaction->perm_view_all_history}}
                                    </td>
                                    <td>
                                        {{$transaction->pin_block}}
                                    </td>
                                    <td>
                                        {{$transaction->permission}}
                                    </td>
                                    <td>
                                        {{$transaction->perm_manage_operators}}
                                    </td>
                                    <td>
                                        {{$transaction->auto_statement_daily}}
                                    </td>
                                    <td>
                                        {{$transaction->auto_statement_weekly}}
                                    </td>
                                    <td>
                                        {{$transaction->auto_statement_weekly_dow}}
                                    </td>
                                    <td>
                                        {{$transaction->auto_statement_monthly}}
                                    </td>
                                    <td>
                                        {{$transaction->base_transaction}}
                                    </td>
                                    <td>
                                        {{$transaction->loyalty}}
                                    </td>
                                    <td>
                                        {{$transaction->instalment}}
                                    </td>
                                    <td>
                                        {{$transaction->longitude}}
                                    </td>
                                    <td>
                                        {{$transaction->latitude}}
                                    </td>
                                    <td>
                                        {{$transaction->ip_address}}
                                    </td>
                                    <td>
                                        {{$transaction->serial_number}}
                                    </td>
                                    <td>
                                        {{$transaction->device_type}}
                                    </td>
                                    <td>
                                        {{$transaction->device_active}}
                                    </td>
                                    <td>
                                        {{$transaction->product_id}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_date_transaction}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_day}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_week}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_month}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_quarter}}
                                    </td>
                                    <td>
                                        {{$transaction->vdi_year}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection