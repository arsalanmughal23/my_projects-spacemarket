<h1>Contact Form Query</h1>
<table>
    <tr style="display: flex;">
        <th style="display: flex;">Department:</th>
        <td>{{ $data['department'] ?? null }}</td>
    </tr>
    <tr style="display: flex;">
        <th style="display: flex;">Full Name:</th>
        <td>{{ $data['fullname'] ?? null }}</td>
    </tr>
    <tr style="display: flex;">
        <th style="display: flex;">Email:</th>
        <td>{{ $data['email'] ?? null }}</td>
    </tr>
    <tr style="display: flex;">
        <th style="display: flex;">Contact:</th>
        <td>{{ $data['contact'] ?? null }}</td>
    </tr>
    <tr style="display: flex;">
        <th style="display: flex;">Description:</th>
        <td>{{ $data['description'] ?? null }}</td>
    </tr>
</table>
