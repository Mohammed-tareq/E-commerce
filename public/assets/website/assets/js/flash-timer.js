    function setCounter() {
    let today = new Date();
    let targetDay = new Date();
    targetDay.setHours(23, 59, 59, 999);

    let diff = targetDay - today;

    if (diff <= 0) {
    $('#hour').text(0);
    $('#minute').text(0);
    $('#second').text(0);
    clearInterval(timer)
    return;
}

    let totalSecond = Math.floor(diff / 1000); // to second

    let hour = Math.floor((totalSecond % 86400) / 3600);
    let minute = Math.floor((totalSecond % 3600) / 60);
    let second = Math.floor(totalSecond % 60);

    $('#hour').text(String(hour).padStart(2, '0'))
    $('#minute').text(String(minute).padStart(2, '0'))
    $('#second').text(String(second).padStart(2, '0'))

}

    let timer;
    $(function () {
    setCounter();
    timer = setInterval(setCounter, 1000);
});

    function setCounterForWeek() {
        let today = new Date();
        let targetDay = new Date();
        targetDay.setDate(targetDay.getDate() + 7);
        targetDay.setHours(23, 59, 59, 999);

        let diff = targetDay - today;

        if (diff <= 0) {
            $('#day-week').text(0);
            $('#hour-week').text(0);
            $('#minute-week').text(0);
            $('#second-week').text(0);
            clearInterval(timerForWeek)
            return;
        }

        let totalSecond = Math.floor(diff / 1000); // to second

        let day = Math.floor(totalSecond / 86400);
        let hour = Math.floor((totalSecond % 86400) / 3600);
        let minute = Math.floor((totalSecond % 3600) / 60);
        let second = Math.floor(totalSecond % 60);

        $('#day-week').text(String(day).padStart(2, '0'))
        $('#hour-week').text(String(hour).padStart(2, '0'))
        $('#minute-week').text(String(minute).padStart(2, '0'))
        $('#second-week').text(String(second).padStart(2, '0'))

    }

    let timerForWeek;
    $(function () {
        setCounterForWeek();
        timerForWeek = setInterval(setCounterForWeek, 1000);
    })
