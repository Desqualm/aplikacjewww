const changeImgBtn = document.querySelector('.change-img-btn');

var isComputed = false;
var decNum = 0;

function convert(entryform, from, to) {
	convertfrom = from.selectedIndex;
	convertto = to.selectedIndex;
	entryform.display.value =
		(entryform.input.value * from[convertfrom].value) / to[convertto].value;
}

function addChar(input, character) {
	if ((character == '.' && decNum == '0') || character != '.') {
		input.value == '' || input.value == '0'
			? (input.value = character)
			: (input.value += character);
		convert(input.form.input.form.measure1.form.measure2);
		isComputed = true;
		if (character == '.') {
			decNum = 1;
		}
	}
}

function openvothcom() {
	window.open(
		'',
		'Display window',
		'toolbar = no, directories = no, menubar=no'
	);
}

function clear(form) {
	form.input.value = 0;
	form.display.value = 0;
	decNum = 0;
}

function changeBackground(hexNumber) {
	document.bgColor = hexNumber;
}

function changeImage(pathToNewImage, currImgClass) {
	image = document.querySelector(currImgClass);
	image.src = pathToNewImage;
}

function chooseRandomImage(images) {
	const randomIndex = Math.floor(Math.random() * images.length);
	return images[randomIndex];
}

changeImgBtn.addEventListener('click', () => {
	changeImage(
		chooseRandomImage([
			'./img/rowlet.png',
			'./img/rowlet2.jpg',
			'./img/rowlet3.jpg',
			'./img/rowlet4.jpg',
		]),
		'.rowlet-img'
	);
});
