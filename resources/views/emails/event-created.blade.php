<p>A new contact form has been submitted:</p>
<table>
    <tr>
        <td>ID</td>
        <td>{{ $event->id }}</td>
    </tr>
    <tr>
        <td>Event Name</td>
        <td>{{ $event->name }}</td>
    </tr>
    <tr>
        <td>Event Start At</td>
        <td>{{ $event->start_at }}</td>
    </tr>
    <tr>
        <td>Event End At</td>
        <td>{{ $event->end_at }}</td>
    </tr>
    <tr>
        <td>Submitted At</td>
        <td>{{ $event->created_at }}</td>
    </tr>
</table>
<style>
    table, td, th {
        border: 1px solid #ddd;
        text-align: left;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 15px;
        text-align: left;
    }
</style>
