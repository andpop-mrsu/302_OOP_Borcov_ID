$username = $env:USERNAME
$computername = $env:COMPUTERNAME
$excel = New-Object -ComObject Excel.Application
$excel.Visible = $false
$workbook = $excel.Workbooks.Add()
$sheet = $workbook.Worksheets.Item(1)
$cell = $sheet.Cells.Item(2,2)
$cell.Value2 = "Привет от PowerShell"
$cell.Font.Size = 12
$cell.Font.Italic = $true

$filename = "$username`_$computername.xlsx"
$path = Join-Path $env:USERPROFILE $filename
$workbook.SaveAs($path)
$excel.Quit()
