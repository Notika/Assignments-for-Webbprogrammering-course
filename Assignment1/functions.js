	window.addEventListener('load', init, false);

	function init() {

		function showTab1() {
			document.getElementById("content_1").className = "show";
			document.getElementById("content_2").className = "hide";
		}

		function showTab2() {
			document.getElementById('content_2').className = "show";
			document.getElementById('content_1').className = "hide";
		}

		document.getElementById("tab_1").addEventListener("click", showTab1, false);
		document.getElementById("tab_2").addEventListener("click", showTab2, false);
		
		function showDetails() {
			var info = this.childNodes[4];
			if (info.className == "hide") {
				info.className = "show";
			} else if (info.className == "show") {
				info.className = "hide";
			}			
		}

		var choice = function(selector) {
			return document.querySelector(selector);
		}

		var detailsList = choice("#itemsToBuy").getElementsByTagName("li");
		
		for (var i = 0; i < detailsList.length; i++) {
			var details = detailsList[i];
			details.addEventListener("click", showDetails, false);
		}

		var totalAmount = 0;

		function addToBasket(event) {
			event.stopPropagation()

			var title = this.parentElement.dataset.title;
			var price = this.parentElement.dataset.price;

			totalAmount = parseInt(totalAmount) + parseInt(price);
			
			var itemInBasket = function(titel, price) {

				var res = document.getElementById('result');
				res.setAttribute('value', totalAmount);

				var shopping_cart = document.getElementById('shopping_cart');
				var li = document.createElement('li');
				var p = document.createElement('p');
				var item = document.createTextNode(title);
				var deleteBtn = document.createElement('img');


				shopping_cart.appendChild(li);
				li.appendChild(p);
				p.appendChild(item);
				li.appendChild(deleteBtn);

				var classAtt = document.createAttribute('class');
				classAtt.value = 'delete_button';
				deleteBtn.setAttributeNode(classAtt);

				var classAttImg = document.createAttribute('src');
				classAttImg.value = 'images/red.jpg'
				deleteBtn.setAttributeNode(classAttImg);

				var removeItem = function() {					
					totalAmount = parseInt(totalAmount) - parseInt(price);
					res.setAttribute('value', totalAmount);

					var removeThis = this.parentElement;
					removeThis.parentElement.removeChild(removeThis);
				}
				deleteBtn.addEventListener('click', removeItem, false);
			}
			itemInBasket(title,price);
		}

		var buyButtons = choice('#itemsToBuy').getElementsByTagName("img");
		for (var i = 0; i < buyButtons.length; i++) {
			var buy = buyButtons[i];
			buy.addEventListener("click", addToBasket, true);
		}

	}
