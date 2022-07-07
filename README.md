##### ApiTest component usage

---
const ID = "USER_ID";

const KEY = "API_KEY";

const API = "https://payeer.com/api/trade";


$client = new ApiClient(ID,KEY,API);

$request = $client->Info()->execute();

$result = $request->getData();

var_dump($result);
