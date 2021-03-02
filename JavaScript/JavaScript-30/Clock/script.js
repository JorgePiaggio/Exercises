const hourHand = document.querySelector('.hour_hand');
const minHand = document.querySelector('.min_hand');
const secHand = document.querySelector('.sec_hand');
const dayDiv = document.querySelector('.day');
const digitalDiv = document.querySelector('.digital');
const timeZones = [
    'Europe/Andorra',
    'Asia/Dubai',
    'Europe/Tirane',
    'Asia/Yerevan',
    'Antarctica/Casey',
    'Antarctica/Davis',
    'Antarctica/DumontDUrville',
    'Antarctica/Mawson',
    'Antarctica/Syowa',
    'Antarctica/Vostok',
    'Europe/Vienna',
    'Australia/Lord_Howe',
    'Antarctica/Macquarie',
    'Australia/Hobart',
    'Australia/Currie',
    'Australia/Melbourne',
    'Australia/Sydney',
    'Australia/Brisbane',
    'Australia/Lindeman',
    'Australia/Perth',
    'Asia/Baku',
    'Asia/Dhaka',
    'Europe/Brussels',
    'Europe/Sofia',
    'Asia/Brunei',
    'Asia/Thimphu',
    'Europe/Minsk',
    'Europe/Zurich',
    'Asia/Shanghai',
    'Asia/Urumqi',
    'Indian/Christmas',
    'Asia/Nicosia',
    'Asia/Famagusta',
    'Europe/Prague',
    'Europe/Berlin',
    'Europe/Copenhagen',
    'Africa/Algiers',
    'Europe/Tallinn',
    'Africa/Cairo',
    'Africa/El_Aaiun',
    'Europe/Madrid',
    'Africa/Ceuta',
    'Europe/Helsinki',
    'Pacific/Fiji',
    'Pacific/Chuuk',
    'Pacific/Pohnpei',
    'Pacific/Kosrae',
    'Europe/Paris',
    'Asia/Tbilisi',
    'Europe/Gibraltar',
    'Europe/Athens',
    'Pacific/Guam',
    'Asia/Hong_Kong',
    'Europe/Budapest',
    'Asia/Jakarta',
    'Asia/Pontianak',
    'Asia/Makassar',
    'Asia/Jayapura',
    'Asia/Jerusalem',
    'Indian/Chagos',
    'Asia/Baghdad',
    'Europe/Rome',
    'Asia/Amman',
    'Asia/Tokyo',
    'Africa/Nairobi',
    'Asia/Bishkek',
    'Pacific/Tarawa',
    'Pacific/Enderbury',
    'Pacific/Kiritimati',
    'Asia/Pyongyang',
    'Asia/Seoul',
    'Asia/Almaty',
    'Asia/Qyzylorda',
    'Asia/Qostanay',
    'Asia/Aqtobe',
    'Asia/Aqtau',
    'Asia/Atyrau',
    'Asia/Oral',
    'Asia/Beirut',
    'Europe/Vilnius',
    'Europe/Luxembourg',
    'Europe/Riga',
    'Africa/Tripoli',
    'Africa/Casablanca',
    'Europe/Monaco',
    'Europe/Chisinau',
    'Pacific/Majuro',
    'Pacific/Kwajalein',
    'Asia/Ulaanbaatar',
    'Asia/Hovd',
    'Asia/Choibalsan',
    'Asia/Macau',
    'Europe/Malta',
    'Indian/Mauritius',
    'Indian/Maldives',
    'Asia/Kuala_Lumpur',
    'Asia/Kuching',
    'Africa/Maputo',
    'Africa/Windhoek',
    'Pacific/Noumea',
    'Pacific/Norfolk',
    'Africa/Lagos',
    'Europe/Amsterdam',
    'Europe/Oslo',
    'Pacific/Nauru',
    'Pacific/Auckland',
    'Pacific/Port_Moresby',
    'Pacific/Bougainville',
    'Asia/Manila',
    'Asia/Karachi',
    'Europe/Warsaw',
    'Asia/Gaza',
    'Asia/Hebron',
    'Pacific/Palau',
    'Asia/Qatar',
    'Indian/Reunion',
    'Europe/Bucharest',
    'Europe/Belgrade',
    'Europe/Kaliningrad',
    'Europe/Moscow',
    'Europe/Simferopol',
    'Europe/Kirov',
    'Europe/Astrakhan',
    'Europe/Volgograd',
    'Europe/Saratov',
    'Europe/Ulyanovsk',
    'Europe/Samara',
    'Asia/Yekaterinburg',
    'Asia/Omsk',
    'Asia/Novosibirsk',
    'Asia/Barnaul',
    'Asia/Tomsk',
    'Asia/Novokuznetsk',
    'Asia/Krasnoyarsk',
    'Asia/Irkutsk',
    'Asia/Chita',
    'Asia/Yakutsk',
    'Asia/Khandyga',
    'Asia/Vladivostok',
    'Asia/Ust-Nera',
    'Asia/Magadan',
    'Asia/Sakhalin',
    'Asia/Srednekolymsk',
    'Asia/Kamchatka',
    'Asia/Anadyr',
    'Asia/Riyadh',
    'Pacific/Guadalcanal',
    'Indian/Mahe',
    'Africa/Khartoum',
    'Europe/Stockholm',
    'Asia/Singapore',
    'Africa/Juba',
    'Asia/Damascus',
    'Africa/Ndjamena',
    'Indian/Kerguelen',
    'Asia/Bangkok',
    'Asia/Dushanbe',
    'Pacific/Fakaofo',
    'Asia/Dili',
    'Asia/Ashgabat',
    'Africa/Tunis',
    'Pacific/Tongatapu',
    'Europe/Istanbul',
    'Pacific/Funafuti',
    'Asia/Taipei',
    'Europe/Kiev',
    'Europe/Uzhgorod',
    'Europe/Zaporozhye',
    'Pacific/Wake',
    'Asia/Samarkand',
    'Asia/Tashkent',
    'Asia/Ho_Chi_Minh',
    'Pacific/Efate',
    'Pacific/Wallis',
    'Pacific/Apia',
    'Africa/Johannesburg'
  ];



var select = document.getElementById('tz');

timeZones.forEach((element, index) => {
        let option_elem = document.createElement('option');

        // Add index to option_elem
        option_elem.value = index;

        // Add element HTML
        option_elem.textContent = element;
        
        // Append option_elem to select_elem
        select.appendChild(option_elem);
 });



Date.prototype.addHours = function(h) {
    this.setTime(this.getTime() + (h*60*60*1000));
    return this;
}



function setDate(){
    const now = new Date(); 
    if(document.getElementById("tz").value != -1){
        var offset = getTimezone(document.getElementById("tz").value);
        now.addHours(offset); // 
    }
    setDay(now); // day name
    //console.log(getTimezone(document.getElementById("tz").value)); // 
    
    // analog
    const seconds = now.getSeconds();
    const secondsDegrees = ((seconds / 60) * 360) + 90;
    secHand.style.transform = `rotate(${secondsDegrees}deg)`;

    const minutes = now.getMinutes();
    const minutesDegrees = ((minutes / 60) * 360) + 90;
    minHand.style.transform = `rotate(${minutesDegrees}deg)`;

    const hour = now.getHours();
    const hourDegrees = ((hour / 12) * 360) + ((minutes/60)*30) + 90;  //
    hourHand.style.transform = `rotate(${hourDegrees}deg)`;    

    //digital
    document.getElementById("digitalString").innerHTML = hour + ":" + minutes + ":" + seconds;  

}


function getTimezone(value){
    let date = new Date(); 

    let intlDateObj = new Intl.DateTimeFormat('en-US', { 
            dateStyle: 'full', 
            timeStyle: 'long',
            timeZone: `${timeZones[value]}`
    }); 

    let timeString = intlDateObj.format(date);
   // console.log(timeString);

    return timeString.split('+')[1];
}


function setDay(now){
    var options = { weekday: 'long'};
    const day = new Intl.DateTimeFormat('en-US', options).format(now);
    document.getElementById("dayString").innerHTML = day;  
    //console.log(day);
}


setDate();
setInterval(setDate, 1000)

