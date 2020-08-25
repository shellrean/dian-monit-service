<!DOCTYPE html>
<html>
<head>
    <title>{{ $id }}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    <h1>{{ $name }}</h1>
     @foreach($report as $rep)
    <table width="100%" class="table table-bordered">
        <tr>
            <td>Kelas</td>
            <td colspan="2">Absent</td>
        </tr>
       @foreach($rep['data'] as $key => $data)
        <tr>
            <td rowspan="<?= count($data)+1 ?>">{{ $key }}</td>
        </tr>
        @foreach($data as $dat)
        <tr>
            <td>{{ $dat['user']['name'] }}</td>
            <td>
                {{ $dat['subject']['name'] }} => {{ $dat['details']['type'] }}<br><br>
                {{ $dat['details']['desc'] }}
            </td>
        </tr>
        @endforeach
     @endforeach
    </table>
    @endforeach
</body>
</html>