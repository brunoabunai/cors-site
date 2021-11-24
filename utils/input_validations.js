var allInputs = document.querySelectorAll('input');
var allTextareas = document.querySelectorAll('textarea');

var inputIsActive = new Array(allInputs.length).fill(true);
var textareaIsActive = new Array(allTextareas.length).fill(true);


allInputs.forEach((input, indexOfInput) => {
  input.onkeyup = () => UserDigitedIn(input, indexOfInput);
  input.addEventListener('blur', function () {
    UserDigitedIn(input, indexOfInput);
  });
  input.onclick = () => {
    if (input.type == "submit") {
      return;
    }
    if (inputIsActive[indexOfInput]) {
      UserDigitedIn(input, indexOfInput);
    }
  };
})


allTextareas.forEach((textarea, indexOfInput) => {
  textarea.onkeyup = () => UserDigitedIn(textarea, indexOfInput);
  textarea.onclick = () => {
    if (textareaIsActive[indexOfInput]) {
      addClass(textarea, "errInputValidation");
      textareaIsActive[indexOfInput] = false;
    }
  };
})

function UserDigitedIn(input, indexOfInput) {
  const exception = (input.title == "true"); // to use, have that a attribute called title in input with value false[]
  const inputArray = toArray(input.value);
  const inputNameArray = toArray(input.name);
  const [
    haveDoubleSpace,
    areEmpty,
    haveSpaceInBegin,
    haveSpaceInEnd,
    havePoorCharacter,
    havePoorCharacterNAME,
    havePoorCharacterPASSWORD,
    notHaveSign,
    notHavePoint,
    itsTextPassword
  ] = getValidations();
  makeValidations();

  function getValidations() {
    let itsInputPassword=false;
    inputNameArray.forEach((letter,indexLetter) => {
      const word= letter+inputNameArray[indexLetter+1]+inputNameArray[indexLetter+2]+inputNameArray[indexLetter+3]+inputNameArray[indexLetter+4]+inputNameArray[indexLetter+5]+inputNameArray[indexLetter+6]+inputNameArray[indexLetter+7];
      if(word=="password"){
        itsInputPassword=true;
      }
    })
    return [
      (inputArray.map(
        (x, y) => (x == " " && x == inputArray[y - 1]) || (x == " " && x == inputArray[y + 1]))).filter(
          x => x == true)[0] || false, // if doubleSpace.
      (inputArray.length < 1), // if are empty
      (inputArray[0] == " "), // if space in begin
      (inputArray[inputArray.length - 1] == " "), //if space in end
      (inputArray.length > 0 && inputArray.length < 3), //if have a few characters
      (inputArray.length > 0 && inputArray.length < 10), //if have a few characters to NAME
      (inputArray.length > 0 && inputArray.length < 8), //if have a few characters to PASSWORD
      (inputArray.indexOf("@") == -1) ? true : false, //if not have @
      (inputArray.indexOf(".") == -1) ? true : false, //if not have .
      itsInputPassword
     
    ]
  };

  function makeValidations() {
    if (areEmpty) {
      if (input.nodeName == "TEXTAREA") {
        textareaIsActive[indexOfInput] = true;
      } else {
        inputIsActive[indexOfInput] = true;
      }
      callNullColor();
      return;
    }

    if (input.type == "password" || itsTextPassword) {
      if ((havePoorCharacterPASSWORD)) {
        callErrorColor();
      } else {
        callSucessColor();
      }
    }

    if (input.type == "text" && !itsTextPassword) {
      if (input.title == "name") {
        console.log('é name')
        if (haveDoubleSpace || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacterNAME) {
          callErrorColor();
        } else {
          callSucessColor();
        }
      }

    }

    if (input.type == "email") {
      if (haveDoubleSpace || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacter || notHaveSign || notHavePoint) {
        callErrorColor();
        console.log(notHaveSign)
      } else {
        callSucessColor();
      }
    }

    if (input.nodeName == "TEXTAREA") {
      if (haveDoubleSpace || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacter) {
        callErrorColor();
      } else {
        callSucessColor();
      }
    }
  }



  function callErrorColor() {
    removeClassSucessFromInput();
    addClassErrorInInput();
  }

  function callSucessColor() {
    addClassSucessInInput();
    removeClassErrorFromInput();
  }

  function callNullColor() {
    removeClassSucessFromInput();
    removeClassErrorFromInput();
  }


  function addClassErrorInInput() {
    addClass(input, "errInputValidation");
  }

  function removeClassErrorFromInput() {
    removeClass(input, "errInputValidation");
  }

  function addClassSucessInInput() {
    addClass(input, "sucessInputValidation");
  }

  function removeClassSucessFromInput() {
    removeClass(input, "sucessInputValidation");
  }

}

//  <input title="false"> //to use exeption
//  <input title="false"> //to not use exeption
//  <input> //not use exeption


function localizeID(item) {
  return document.getElementById(item);
}

function addInPage(content) {
  document.querySelector('body').innerHTML += content;
}

function toArray(stringItem) {
  return String(stringItem).split("");
}

function addClass(element, className) {
  element.classList.add(className);
}

function removeClass(element, className) {
  element.classList.remove(className);
}

function changeBackground(element, background) {
  element.style.backgroundColor = background;
}

function changeValue(element, value) {
  element.value = value;
}

function changeColor(element, color) {
  element.style.Color = color;
}

function removeReadOnly(element) {
  element.removeAttribute("readonly");
}

function addReadOnly(element) {
  element.setAttribute("readonly", true);
}

function changeColorOfElementClicked(elementCLicked, color) {
  elementCLicked.style.fill = color;
}