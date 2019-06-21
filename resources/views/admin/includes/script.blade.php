<script>
    var today = new Date();
    var dd = today.getDate();

    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10)
    {
        dd='0'+dd;
    }

    if(mm<10)
    {
        mm='0'+mm;
    }
    today1 = yyyy+'-'+mm+'-'+dd;
    //    console.log("Today1"+today1);
    var nepalitoday = AD2BS(today1);

    //    console.log("Nepalitoday"+nepalitoday);
    var finalnepali = nepalitoday.split("-");
    //    console.log(finalnepali[0]);
    var currentMonth = finalnepali[1] ;
    //    console.log(currentMonth)
    var currentYear = finalnepali[0] ;

    var selectYear = document.getElementById("year");
    var selectMonth = document.getElementById("month");
    //    var currentday = finalnepali[2];
    //console.log(currentday);
    var months = ["Baisakh", "Jestha", "Asad", "Shrawan", "Bhadra", "Asoj", "Kartik", "Mangsir", "Poush", "Magh", "Falgun", "Chaitra"];

    var monthAndYear = document.getElementById("monthAndYear");

    showCalendar(currentMonth, currentYear);



    function next() {
        if (!(currentMonth=='12' && currentYear=='2079')) {
            currentYear = (parseInt(currentMonth) == 12) ? parseInt(currentYear) + 1 : parseInt(currentYear);
            currentMonth = (parseInt(currentMonth) % 12) + 1;
            showCalendar(currentMonth, currentYear);
        }
    }

    function previous() {
        if (!(currentMonth=='1' && currentYear=='2076')) {
            currentYear = (parseInt(currentMonth) == 1) ? parseInt(currentYear) - 1 : currentYear;
            currentMonth = (parseInt(currentMonth) == 1) ? 12 : parseInt(currentMonth) - 1;
            showCalendar(currentMonth, currentYear);
        }
    }

    function jump() {
        currentYear = parseInt(selectYear.value);
        currentMonth = parseInt(selectMonth.value)+1;
        showCalendar(currentMonth, currentYear);
    }


    function showCalendar(month, year, hall) {
        var days = {};
        days["2076"]=[31,32,31,32,31,30,30,30,29,29,30,30];
        days["2077"]=[31,32,31,32,31,30,30,30,29,30,29,31];
        days["2078"]=[31,31,31,32,31,31,30,29,30,29,30,30];
        days["2079"]=[31,31,32,31,31,31,30,29,30,29,30,30];

        var firstDay = year+"-"+month+"-01";
        var dateInAD = BS2AD(firstDay);


        var weekday=new Date(dateInAD).getDay();

        var daysInMonth = days[year][parseInt(month)-1];
        var tbl = document.getElementById("calendar-body"); // body of the calendar

        tbl.innerHTML = "";
        monthAndYear.innerHTML = months[parseInt(month)-1] + " " + year;
        document.getElementById("monthyear").value=year+"-"+month+"-";

        selectYear.value = parseInt(year);
        selectMonth.value = parseInt(month)-1;



        // creating all cells
        var date = 1;
        for (var i = 0; i < 6; i++) {
            var row = document.createElement("tr");
            for (var j = 0; j < 7; j++) {
                if (i === 0 && j < weekday) {
                    var cell = document.createElement("td");
                    var cellText = document.createTextNode("");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                }
                else if (date > daysInMonth) {
                    break;
                }
                else {
                    var cell = document.createElement("td");
                    var cellText = document.createTextNode(date);
                    // console.log(finalnepali[0]+":::"+year);
                    if (date == parseInt(finalnepali[2])  &&  year == parseInt(finalnepali[0]) && month == parseInt(finalnepali[1]) ) {
                        cell.classList.add("today");
                    } // color today's date

                    var currentDate=null;
                    var book=null;
                    <?php
                    foreach ($bookings as $booking){
                                echo "currentDate=\"".$booking['day']."\";";
                                echo "book=\"".$booking['book']."\";";

                                ?>
                        if(currentDate==year+"-"+parseInt(month)+"-"+date) {
                            if (book == 3) {
                                cell.className+="taken";
                            } else if (book == 2) {
                                cell.className+="evening-taken";
                            } else {
                                cell.className+="morning-taken";
                            }
                        }
                    <?php
                            }
                    ?>
                    cell.appendChild(cellText);
                    var thisDate=year+"-"+parseInt(month)+"-";
                    cell.onclick=function () {
                        displayModel(thisDate+$(this).text());
                        // alert();

                    };
                    row.appendChild(cell);
                    date++;

                }



            }

            tbl.appendChild(row); // appending each row into calendar body.
        }

    }


</script>