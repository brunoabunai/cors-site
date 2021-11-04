var numberOfBoxes = document.querySelectorAll('box-activer').length;
var globalStateBox = new Array(numberOfBoxes).fill(false);

var prefix = 'box_'

var html = document.querySelector('html');

function mapAllTagsA() {
  const AllTagsA = document.querySelectorAll('a');

  AllTagsA.forEach(tagA => {
    if (tagA.onclick) {
      const eventBeforeOnclick = tagA.onclick;
      tagA.onclick = (event) => {
        const divOfBoxClicked = (getValidationsToMouseClick(event))[2];
        if (someBoxIsOpen() && haveSomeBoxActiver() && !divOfBoxClicked) {
          processWhenIsOpen(event)
        } else {
          eventBeforeOnclick();
        }
      };
    }


  })
}

mapAllTagsA();

function haveSomeBoxActiver() {
  const boxActivers = document.querySelectorAll('.box-activer');
  return (boxActivers.length > 0) ? true : false;
}

function someBoxIsOpen() {
  return globalStateBox[globalStateBox.indexOf(true)] || false;
};

function getBoxOpen() {
  return globalStateBox.indexOf(true);
}

function processWhenIsOpen(event) {
  event.preventDefault();
  makeProcessToRemoveBox(getBoxOpen());
}

try {

  html.onmouseup = (evt) => {
    const [
      [boxActiverClicked, witchBoxActiver], svgClicked, boxDivClicked, [aClicked, aDidCLicked]
    ] = getValidationsToMouseClick(evt);
    const haveBoxOpen = getBoxOpen() != -1 || false;
    if ((haveBoxOpen && !boxActiverClicked) && (haveBoxOpen && !boxDivClicked)) {
      makeProcessToRemoveBox(getBoxOpen());
      return;
    }
    let boxes = document.querySelectorAll('.box');
    if (boxes.length > 1) {
      document.querySelector(`.${prefix + getBoxOpen()} > svg > path`).style.fill = 'var(--text-color)';
      changeStateBox(getBoxOpen());
      boxes.forEach(boxOfArray => {
        boxOfArray.remove();
      })
      mapAllTagsA();
      alert("Por favor não clique tão rápido")
    }


    let boxOp;
    if (boxActiverClicked) {
      const classesOfBoxActiver = (witchBoxActiver.classList.value).split(' ');
      const classFiltered = classesOfBoxActiver.filter((theClass, indexClass) => {
        const classSpelled = theClass.split('');
        return (classSpelled[0] + classSpelled[1] + classSpelled[2] + classSpelled[3] == prefix)
      });
      boxOp = Number(classFiltered[0].replace(prefix, ''));
    }

    if (!haveBoxOpen && boxActiverClicked) {
      makeProcessToCreateBox(boxOp);
      return;
    }

    if (haveBoxOpen && boxActiverClicked) {
      makeProcessToRemoveBox(getBoxOpen());
      return;
    }
  }
} catch (error) {
  alert(error);
  console.log(error);
}



function getValidationsToMouseClick(evt) {
  function validationCLassActiver() {
    let validation = false;
    let boxActiver = false;
    evt.path.forEach(itemCLicked => {
      if (itemCLicked.classList) {
        const classesOfItem = itemCLicked.classList.value.split(' ');
        const haveClassActiver = classesOfItem.filter(TheClass => TheClass == 'box-activer');
        if (haveClassActiver.length > 0) {
          validation = true;
          boxActiver = itemCLicked;
          return
        }
      }
    })
    return [validation, boxActiver];
  }
  return [
    validationCLassActiver(),
    evt.path.filter(itemCLicked => itemCLicked.nodeName == 'svg').length > 0,
    evt.path.filter(itemCLicked => itemCLicked.id == 'box').length > 0,
    [(evt.path.filter(itemCLicked => itemCLicked.nodeName == 'A'))[0], evt.path.filter(itemCLicked => itemCLicked.nodeName == 'A').length > 0],
  ]


}


function makeProcessToCreateBox(op) {
  document.querySelector(`.${prefix + op} > svg > path`).style.fill = '#c6c6c6';
  createBox(op);
  changeStateBox(op);
  mapAllTagsA();
  //removeTagAOfOpennedScreen();
}

function makeProcessToRemoveBox() {
  document.querySelector(`.${prefix + getBoxOpen()} > svg > path`).style.fill = 'var(--text-color)';
  removeBox();
  setTimeout(function () {
    changeStateBox(getBoxOpen());
  }, 200);
  mapAllTagsA();


}

function createBox(op) {
  const box = constructorBox(op);
  addInPage(box);
}

function removeBox() {
  let box = localizeID('box');
  let endAnimationOfBox = box.animate([
    // keyframes
    {
      opacity: 1
    },
    {
      opacity: 0
    }
  ], {
    // timing options
    duration: 200,
    iterations: 1
  });
  endAnimationOfBox.onfinish = () => {
    box.remove();
  }
}

function changeStateBox(op) {
  globalStateBox[op] = !globalStateBox[op];
}

function conditionBox() {
  return (!globalStateBox[0] && !globalStateBox[1]);
}

function setRouteColor(route) {
  const nameId = getRoute();
  return (nameId == route) ? `#000` : `#999`;
}

function getRoute() {
  let route = window.location.toString();
  route = route.split("/");
  return route[route.length - 1]
}


function setRouteCLick(route) {
  const routeArr = route.split('/');
  return (getRoute() == routeArr[routeArr.length - 1]) ? `#` : route;
}

function setRouteCLickGear(route) {
  const routeArr = route.split('/');
  return (getRoute() == routeArr[routeArr.length - 1]) ? `/TCC/cors-site/home` : route;
}

function setContentByRoute(content, route) {
  const routeArr = route.split('/');
  return (getRoute() == routeArr[routeArr.length - 1]) ? `
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M19 22H5C4.44772 22 4 21.5523 4 21V13H2L11.292 3.70698C11.4796 3.51921 11.7341 3.4137 11.9995 3.4137C12.2649 3.4137 12.5194 3.51921 12.707 3.70698L22 13H20V21C20 21.5523 19.5523 22 19 22ZM10 15H14V20H18V11.828L12 5.82798L6 11.828V20H10V15Z" fill="var(--text-color)"></path>
    </svg>
    Ir Para a Home
  `: content;
  ;

}

function constructorBox(op) {
  var box = {
    name: "",
    content: "",
    route: getRoute(),
  };
  switch (op) {
    case 0:
      box.name = "box of config";
      box.content = /*html*/
        `
              <div id="box" class="box boxGear">
                <div class="options">
                  <span>Opções:</span>
                  
                  <svg class="close" onclick="makeProcessToRemoveBox()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>

                </div>
                  <a id="myaccount" class="btn-account opacty-button" href="${setRouteCLickGear(`/TCC/cors-site/myaccount/user`)}"> 
                    ${setContentByRoute(
          `
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 20H4C2.93052 20.032 2.03642 19.1933 2 18.124V5.875C2.03641 4.80581 2.93068 3.96743 4 4H20C21.0693 3.96743 21.9636 4.80581 22 5.875V18.125C21.963 19.1939 21.0691 20.032 20 20ZM4 6V17.989L20 18V6.011L4 6ZM13.43 16H6C6.07353 15.1721 6.46534 14.4049 7.093 13.86C7.79183 13.1667 8.73081 12.7692 9.715 12.75C10.6992 12.7692 11.6382 13.1667 12.337 13.86C12.9645 14.4051 13.3563 15.1721 13.43 16ZM18 15H15V13H18V15ZM9.715 12C9.17907 12.0186 8.65947 11.8139 8.28029 11.4347C7.9011 11.0555 7.69638 10.5359 7.715 10C7.69668 9.46416 7.9015 8.94474 8.28062 8.56562C8.65974 8.1865 9.17916 7.98168 9.715 8C10.2508 7.98168 10.7703 8.1865 11.1494 8.56562C11.5285 8.94474 11.7333 9.46416 11.715 10C11.7336 10.5359 11.5289 11.0555 11.1497 11.4347C10.7705 11.8139 10.2509 12.0186 9.715 12ZM18 11H14V9H18V11Z" fill="var(--text-color)"></path>
                      </svg>
                    
                      Minha Conta
                      `, `/TCC/cors-site/myaccount/user`
        )}
                  </a>

                  <a class="btn-portal opacty-button" href="${setRouteCLickGear(`/TCC/cors-site/menu`)}">
                      
                      ${setContentByRoute(
          `
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 20H4C2.89543 20 2 19.1046 2 18V6C2 4.89543 2.89543 4 4 4H20C21.1046 4 22 4.89543 22 6V18C22 19.1046 21.1046 20 20 20ZM4 12V18H20V12H4ZM4 6V8H20V6H4ZM13 16H6V14H13V16Z" fill="var(--text-color)"></path>
                        </svg>
                      
                        Portal do Admin
                        `, `/TCC/cors-site/menu`
        )}
                  </a>
                  <a class="btn-leave opacty-button" onclick="logOff()" href="/TCC/cors-site/unplugged/logOff">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19 21H5C3.89543 21 3 20.1046 3 19V15H5V19H19V5H5V9H3V5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM11 16V13H3V11H11V8L16 12L11 16Z" fill="var(--danger)"></path>
                    </svg>

                   Sair 
                  </a>
              </div>
          `;
      break;
    case 1:
      box.name = "box of config to Commum Member";
      box.content = /*html*/
        `
          <div id="box" class="box boxGear">
            <div class="options">
              <span>Opções:</span>
              
              <svg class="close" onclick="makeProcessToRemoveBox()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>

            </div>
              <a id="myaccount" class="btn-account opacty-button" href="${setRouteCLickGear(`/TCC/cors-site/myaccount/user`)}"> 
                ${setContentByRoute(
          `
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 20H4C2.93052 20.032 2.03642 19.1933 2 18.124V5.875C2.03641 4.80581 2.93068 3.96743 4 4H20C21.0693 3.96743 21.9636 4.80581 22 5.875V18.125C21.963 19.1939 21.0691 20.032 20 20ZM4 6V17.989L20 18V6.011L4 6ZM13.43 16H6C6.07353 15.1721 6.46534 14.4049 7.093 13.86C7.79183 13.1667 8.73081 12.7692 9.715 12.75C10.6992 12.7692 11.6382 13.1667 12.337 13.86C12.9645 14.4051 13.3563 15.1721 13.43 16ZM18 15H15V13H18V15ZM9.715 12C9.17907 12.0186 8.65947 11.8139 8.28029 11.4347C7.9011 11.0555 7.69638 10.5359 7.715 10C7.69668 9.46416 7.9015 8.94474 8.28062 8.56562C8.65974 8.1865 9.17916 7.98168 9.715 8C10.2508 7.98168 10.7703 8.1865 11.1494 8.56562C11.5285 8.94474 11.7333 9.46416 11.715 10C11.7336 10.5359 11.5289 11.0555 11.1497 11.4347C10.7705 11.8139 10.2509 12.0186 9.715 12ZM18 11H14V9H18V11Z" fill="var(--text-color)"></path>
                  </svg>
                
                  Minha Conta
                  `, `/TCC/cors-site/myaccount/user`
        )}
              </a>
              <a class="btn-leave opacty-button" onclick="logOff()" href="/TCC/cors-site/unplugged/logOff">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19 21H5C3.89543 21 3 20.1046 3 19V15H5V19H19V5H5V9H3V5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM11 16V13H3V11H11V8L16 12L11 16Z" fill="var(--danger)"></path>
                </svg>

              Sair 
              </a>
          </div>
            `;
      break;
    case 2:
      box.name = "Box of branches of home";
      box.content = /*html*/
        ` 
              <div id='box' class="boxMenu">
                <div>
                  <svg class="close" onclick="makeProcessToRemoveBox()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                </div>
                  <a id="home" style="color:${setRouteColor(`home`)} !important;" href="${setRouteCLick(`/TCC/cors-site/home`)}">Home</a>
                  <a id="covidInformations" style="color: ${setRouteColor(`covidInformations`)} !important" href="${setRouteCLick(`/TCC/cors-site/covidInformations`)}">Covid Informações</a>
                  <a id="infos" style="color: ${setRouteColor(`infos`)} !important"  href="${setRouteCLick(`/TCC/cors-site/recommendations/infos`)}">Sugestão</a>
              </div>
          `;
      break;
    case 3:
        box.name = "box of config to writer";
        box.content = /*html*/
          `
                <div id="box" class="box boxGear">
                  <div class="options">
                    <span>Opções:</span>
                    
                    <svg class="close" onclick="makeProcessToRemoveBox()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
  
                  </div>
                    <a id="myaccount" class="btn-account opacty-button" href="${setRouteCLickGear(`/TCC/cors-site/myaccount/user`)}"> 
                      ${setContentByRoute(
            `
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M20 20H4C2.93052 20.032 2.03642 19.1933 2 18.124V5.875C2.03641 4.80581 2.93068 3.96743 4 4H20C21.0693 3.96743 21.9636 4.80581 22 5.875V18.125C21.963 19.1939 21.0691 20.032 20 20ZM4 6V17.989L20 18V6.011L4 6ZM13.43 16H6C6.07353 15.1721 6.46534 14.4049 7.093 13.86C7.79183 13.1667 8.73081 12.7692 9.715 12.75C10.6992 12.7692 11.6382 13.1667 12.337 13.86C12.9645 14.4051 13.3563 15.1721 13.43 16ZM18 15H15V13H18V15ZM9.715 12C9.17907 12.0186 8.65947 11.8139 8.28029 11.4347C7.9011 11.0555 7.69638 10.5359 7.715 10C7.69668 9.46416 7.9015 8.94474 8.28062 8.56562C8.65974 8.1865 9.17916 7.98168 9.715 8C10.2508 7.98168 10.7703 8.1865 11.1494 8.56562C11.5285 8.94474 11.7333 9.46416 11.715 10C11.7336 10.5359 11.5289 11.0555 11.1497 11.4347C10.7705 11.8139 10.2509 12.0186 9.715 12ZM18 11H14V9H18V11Z" fill="var(--text-color)"></path>
                        </svg>
                      
                        Minha Conta
                        `, `/TCC/cors-site/myaccount/user`
          )}
                    </a>
  
                    <a class="btn-portal opacty-button" href="${setRouteCLickGear(`/TCC/cors-site/menu`)}">
                        
                        ${setContentByRoute(
            `
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M20 20H4C2.89543 20 2 19.1046 2 18V6C2 4.89543 2.89543 4 4 4H20C21.1046 4 22 4.89543 22 6V18C22 19.1046 21.1046 20 20 20ZM4 12V18H20V12H4ZM4 6V8H20V6H4ZM13 16H6V14H13V16Z" fill="var(--text-color)"></path>
                          </svg>
                        
                          Portal do Writer
                          `, `/TCC/cors-site/menu`
          )}
                    </a>
                    <a class="btn-leave opacty-button" onclick="logOff()" href="/TCC/cors-site/unplugged/logOff">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 21H5C3.89543 21 3 20.1046 3 19V15H5V19H19V5H5V9H3V5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM11 16V13H3V11H11V8L16 12L11 16Z" fill="var(--danger)"></path>
                      </svg>
  
                     Sair 
                    </a>
                </div>
            `;
        break;
    default:
      box.name = "null";
      box.content = "";
  }
  return box.content;
}



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
