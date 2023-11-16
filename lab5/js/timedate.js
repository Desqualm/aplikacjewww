function getTheDate() {
	today = new Date();
	date =
		'' +
		(today.getMonth() + 1) +
		'/' +
		today.getDate() +
		'/' +
		(today.getYear() - 100);
	document.getElementById('data').innerHTML = date;
}

var timerId = null;
var isTimerRunning = false;

function stopclock() {
	if (isTimerRunning) {
		clearTimeout(timerId);
		isTimerRunning = false;
	}
}

function startclock() {
	stopclock();
	getTheDate();
	showTime();
}

function showtime() {
	var day = new Date();
	var hours = now.getHours();
	var minutes = now.getMinutes();
	var seconds = now.getSeconds();
	var time = '' + (hours < 12 ? hours - 12 : hours);
	time += (minutes < 10 ? ':0' : ':') + minutes;
	time += (seconds < 10 ? ':0' : ':') + seconds;
	time += hours >= 12 ? ' P.M.' : ' A.M.';
	document.getElementById('zegarek').innerHTML = time;
	timerId = setTimeout('showtime()', 1000);
	isTimerRunning = true;
}

function timeRemainingToTargetDate(targetDate) {
	const targetDateTime = new Date(targetDate);
	const currentDate = new Date();
	const timeDifference = targetDateTime - currentDate;

	if (timeDifference < 0) {
		return 'Ta data już minęła!';
	}

	const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
	const hours = Math.floor(
		(timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
	);
	const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
	const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

	const timeRemainingString = `${days} dni, ${hours} godzin, ${minutes} minut, ${seconds} sekund`;

	return timeRemainingString;
}

function updateRemainingTime(elementId, targetDate) {
	const timeLeftElement = document.getElementById(elementId);
	const remainingTime = timeRemainingToTargetDate(targetDate);
	timeLeftElement.innerHTML =
		'Do premiery pozostało: ' +
		"<p class='time-left'>" +
		remainingTime +
		'</p>';
}

updateRemainingTime('timeLeft', '2023-11-19T23:59:59');
updateRemainingTime('timeLeft2', '2023-12-05T23:59:59');
updateRemainingTime('timeLeft3', '2023-12-21T23:59:59');

setInterval(function () {
	updateRemainingTime('timeLeft', '2023-11-19T22:59:59');
	updateRemainingTime('timeLeft2', '2023-12-05T21:59:59');
	updateRemainingTime('timeLeft3', '2023-12-21T18:59:59');
}, 1000);
