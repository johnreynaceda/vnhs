<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Masterlist Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #999;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Student Masterlist Report</h1>
        <p>Official Academic Roll &bull; Generated on {{ now()->format('F j, Y h:i A') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>LRN</th>
                <th>Student Name</th>
                <th>Academic Year</th>
                <th>Grade Level</th>
                <th>Section</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->user?->lrn ?? 'N/A' }}</td>
                    <td>{{ $student->user?->name ?? 'N/A' }}</td>
                    <td>{{ $student->schoolYear?->name ?? 'N/A' }}</td>
                    <td>{{ $student->gradeLevel?->name ?? 'N/A' }}</td>
                    <td>{{ $student->section?->name ?? 'N/A' }}</td>
                </tr>
            @endforeach
            
            @if($students->isEmpty())
                <tr>
                    <td colspan="5" class="text-center" style="padding: 20px; color:#666;">No enrolled students match the applied filters.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="footer">
        &copy; {{ now()->year }} Administration System - Confidential
    </div>

</body>
</html>
