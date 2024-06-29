var languagesSelect = myForm.language;
             
            function changeOption(){
                 
                var selection = document.getElementById("selection");
                var selectedOption = languagesSelect.options[languagesSelect.selectedIndex];
                selection.textContent = "Вы выбрали: " + selectedOption.text;
            }
             
            languagesSelect.addEventListener("change", changeOption);
var elemDiv = document.createElement('div');
elemDiv.style.cssText = 'position:absolute;width:100%;height:100%;opacity:0.3;z-index:100;background:#000;';
document.body.appendChild(elemDiv);
