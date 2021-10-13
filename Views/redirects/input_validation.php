<script type="text/javascript">
    var allInputs = document.querySelectorAll('input');
    var allTextareas = document.querySelectorAll('textarea');

    var inputIsActive = new Array(allInputs.length).fill(true);
    var textareaIsActive = new Array(allTextareas.length).fill(true);


    allInputs.forEach((input, indexOfInput) => {
      input.onkeyup = () => UserDigitedIn(input, indexOfInput);
      input.addEventListener('blur', function() {
        UserDigitedIn(input, indexOfInput);
      });
      input.onclick = () => {
        if (input.type == "submit") {
          return;
        }
        if (inputIsActive[indexOfInput]) {
          addClass(input, "errInputValidation");
          inputIsActive[indexOfInput] = false;
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
      const exception = (input.title == "true"); // to use, have that a attribute called title in input with value false
      const inputArray = toArray(input.value);
      const [haveDoubleSpace, areEmpty, haveSpaceInBegin, haveSpaceInEnd, havePoorCharacter, notHaveSign, notHavePoint] = getValidations();
      makeValidations();

      function getValidations() {
        return [
          (inputArray.map(
            (x, y) => (x == " " && x == inputArray[y - 1]) || (x == " " && x == inputArray[y + 1]))).filter(
            x => x == true)[0] || false, // if doubleSpace.
          (inputArray.length < 1), // if are empty
          (inputArray[0] == " "), // if space in begin
          (inputArray[inputArray.length - 1] == " "), //if space in end
          (exception) ? (inputArray.length > 0 && inputArray.length < 8) : false, //if have a few characters
          (inputArray.indexOf("@") == -1) ? true : false, //if not have @
          (inputArray.indexOf(".") == -1) ? true : false, //if not have .
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
        if (input.type == "password") {
          if ((havePoorCharacter)) {
            callErrorColor();
          } else {
            callSucessColor();
          }
        }

        if (input.type == "text") {
          if (haveDoubleSpace || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacter ) {
            callErrorColor();
            
          } else {
            callSucessColor();
            
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
  </script>