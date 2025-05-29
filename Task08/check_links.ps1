$desktopPath = [Environment]::GetFolderPath("Desktop")
$badLinksPath = Join-Path $desktopPath "BadLinks"

if (!(Test-Path $badLinksPath)) {
    New-Item -ItemType Directory -Path $badLinksPath
}

$shell = New-Object -ComObject WScript.Shell
Get-ChildItem -Path $desktopPath -Filter *.lnk | ForEach-Object {
    $shortcut = $shell.CreateShortcut($_.FullName)
    if (!(Test-Path $shortcut.TargetPath)) {
        Move-Item $_.FullName -Destination $badLinksPath
    }
}
