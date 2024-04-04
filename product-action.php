
<?php
if (!empty($_GET["action"])) {
	$serviceId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
	$quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';

	switch ($_GET["action"]) {
		case "add":
			if (!empty($quantity)) {
				$stmt = $db->prepare("SELECT * FROM services_tbl where services_ID= ?");
				$stmt->bind_param('i', $serviceId);
				$stmt->execute();
				$serviceDetails = $stmt->get_result()->fetch_object();
				$itemArray = array($serviceDetails->services_ID => array('title' => $serviceDetails->title, 'services_ID' => $serviceDetails->services_ID, 'quantity' => $quantity, 'price' => $serviceDetails->price));
				if (!empty($_SESSION["cart_item"])) {
					if (in_array($serviceDetails->services_ID, array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($serviceDetails->services_ID == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $quantity;
							}
						}
					} else {
						$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;

		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($serviceId == $v['services_ID'])
						unset($_SESSION["cart_item"][$k]);
				}
			}
			break;

		case "empty":
			unset($_SESSION["cart_item"]);
			break;

		case "details":
			header("location:details.php");
			break;
			
		case "plus":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($serviceId == $v['services_ID']) {
						$_SESSION["cart_item"][$k]["quantity"]++;
						// Prevent negative quantities
						$_SESSION["cart_item"][$k]["quantity"] = max(1, $_SESSION["cart_item"][$k]["quantity"]);
					}
				}
			}
			break;

		case "minus":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($serviceId == $v['services_ID']) {
						$_SESSION["cart_item"][$k]["quantity"]--;
						// Remove item if quantity reaches 0
						if ($_SESSION["cart_item"][$k]["quantity"] <= 0) {
							unset($_SESSION["cart_item"][$k]);
						}
					}
				}
			}
			break;
	}
}
