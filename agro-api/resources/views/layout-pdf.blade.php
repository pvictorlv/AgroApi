<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dosagens</title>
</head>
<body>
<h1>Dosagens</h1>
@forelse($dosagens as $dosagem)
    <ul>
        <li>Defensivo {{ $dosagem->produto()->nome }}</li>
        <li>Efetivo contra {{ $dosagem->praga()->nome }}</li>
        <li>Aplicar em culturas de {{ $dosagem->cultura()->nome }}</li>
        <li>Dosagem: {{ $dosagem->dosagem }}</li>
    </ul>
    <hr>
@empty
    <h3>Nenhuma dosagem cadastrada.</h3>
@endforelse


</body>
</html>
