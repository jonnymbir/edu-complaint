<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>CUSTOMER COMPLAINT FORM</h2>

    <h3>CUSTOMER INFORMATION ({{ $complaint->status }})</h3>
    <table>
        <tr>
            <td>Customer Name:</td>
            <td>{{ $complaint->full_name }}</td>
            <td>Customer Phone:</td>
            <td>{{ $complaint->telephone }}</td>
        </tr>
        <tr>
            <td>Customer Region:</td>
            <td>{{ $complaint->region?->name ?? 'Not Provided' }}</td>
            <td>Customer District:</td>
            <td>{{ $complaint->district?->name ?? 'Not Provided' }}</td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>{{ $complaint->sex }}</td>
            <td>Age Range:</td>
            <td>{{ $complaint->age_range }}</td>
        </tr>
        <tr>
            <td>Stakeholder Type:</td>
            <td>{{ $complaint->stakeholder_type }}</td>
            <td>Ticket Number:</td>
            <td>{{ $complaint->ticket_number }}</td>
        </tr>
        <tr>
            <td>Concern:</td>
            <td>{{ $complaint->concern }}</td>
            <td>
                {{-- Concern: --}}
            </td>
            <td>
                {{-- {{ $complaint->concern}} --}}
            </td>
        </tr>
    </table>

    <h3>COMPLAINT INFORMATION</h3>
    <table>
        <tr>
            <td>Complaint Date:</td>
            <td>{{ date('dS F, Y', strtotime($complaint->created_at)) }}</td>
            <td>Anonymous Status:</td>
            <td>{{ $complaint->is_anonymous ? 'True' : 'False' }}</td>
        </tr>
        <tr>
            <td>Complaint Forwarded:</td>
            <td>{{ $complaint->is_forwarded ? 'Yes' : 'No' }}</td>
            <td>Times Forwarded:</td>
            <td>{{ $complaint->times_forwarded }}</td>
        </tr>
        <tr>
            <td>Complaint Response:</td>
            <td>{{ $complaint->response ?? 'Not Provided' }}</td>
            <td>Response Channel:</td>
            <td>{{ $complaint->response_channel }}</td>
        </tr>
        <tr>
            <td>Complaint Details:</td>
            <td colspan="3">
                {{ $complaint->details }}
            </td>
        </tr>
        <tr>
            <td>Complaint Categories:</td>
            <td colspan="3">
                {{ count($complaint->categories) > 0 ? $complaint->categories->pluck('name')->implode(', ') : 'Not Provided' }}
            </td>
        </tr>
        {{-- <tr>
            <td>First Response Corrective Action:</td>
            <td colspan="3">
                <textarea name="first_response_corrective_action"></textarea>
            </td>
        </tr>
        <tr>
            <td>Suspected Cause:</td>
            <td colspan="3">
                <textarea name="suspected_cause"></textarea>
            </td>
        </tr>
        <tr>
            <td>Corrective Action Person(s):</td>
            <td colspan="3"><input type="text" name="corrective_action_person"></td>
        </tr>
        <tr>
            <td>Corrective Action Follow-up:</td>
            <td colspan="3">
                <textarea name="corrective_action_follow_up"></textarea>
            </td>
        </tr>
        <tr>
            <td>What steps should be considered to avoid a repeat of the problem:</td>
            <td colspan="3">
                <textarea name="avoid_repeat_problem"></textarea>
            </td>
        </tr>
        <tr>
            <td>Date:</td>
            <td><input type="date" name="date"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Name of person completing this form</td>
            <td><input type="text" name="name"></td>
            <td>Signature</td>
            <td><input type="text" name="signature"></td>
        </tr> --}}
    </table>

</body>

</html>
