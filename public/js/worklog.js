$( document ).ready(function() {

    flatpickr(".fp-date", {
        "locale": "hu" 
    });

    flatpickr(".fp-time", {
        enableTime: true,
        noCalendar: true,

        enableSeconds: false, 

        time_24hr: true,

        dateFormat: "H:i", 

        defaultHour: 8,
        defaultMinute: 0
    });

    var d = new Date();
    document.getElementById("todaysname").innerHTML = d.toLocaleString('hu-HU', {
        weekday: 'long',
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    });

    var daysname = new Date(day).toLocaleString('hu-HU', {
                            weekday: 'long',
                            month: 'long',
                            day: 'numeric',
                            year: 'numeric'
                        });
    document.getElementById("daysname").innerHTML = daysname;

});