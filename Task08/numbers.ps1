function Show-Date_Info {
    $today = Get-Date
    $day = $today.Day
    $month = $today.Month
    $year = $today.Year

    Write-Host "Сегодня: $($today.ToString("dd.MM.yyyy"))"

    $urls = @(
        "http://numbersapi.com/$day",
        "http://numbersapi.com/$month",
        "http://numbersapi.com/$year"
    )

    foreach ($url in $urls) {
        try {
            $fact = Invoke-RestMethod -Uri $url
            Write-Host $fact
        } catch {
            Write-Host "Ошибка при получении данных с $url"
        }
    }
}

# Пример вызова функции
Show-Date_Info
