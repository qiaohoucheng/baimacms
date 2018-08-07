var memoryColors = [
        {r: 100, g: 200, b: 10,  a: 0.6},
        {r: 80,  g: 100, b: 50,  a: 0.9},
        {r: 70,  g: 80,  b: 10,  a: 0.9},
        {r: 20,  g: 200, b: 60,  a: 0.9},
        {r: 88,  g: 0,   b: 30,  a: 0.4},
        {r: 100, g: 0,   b: 100, a: 0.6},
        {r: 200, g: 0,   b: 0},
        {r: 200, g: 30,  b: 100}
    ],
    $myColorPicker = $('input.color').colorPicker({
        customBG: '#222',
        readOnly: true,
        init: function(elm, colors) { // colors is a different instance (not connected to colorPicker)
            elm.style.backgroundColor = elm.value;
            elm.style.color = colors.rgbaMixCustom.luminance > 0.22 ? '#222' : '#ddd';
        },
        // appendTo: document.querySelector('.the-paragraph')
        // renderCallback: function(colors, mode) {
        // 	console.log(mode);
        // }
        // memoryColors: memoryColors,
        // actionCallback: function(event, type) {
        // 	if (type === 'toMemory') {
        // 		// $myColorPicker.renderMemory(memoryColors);
        // 	}
        // }
    }).each(function(idx, elm) {
        // $(elm).css({'background-color': this.value})
    });