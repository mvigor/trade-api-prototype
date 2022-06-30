##### ApiTest component usage

---

$request = new ApiClient()\
            ->Info()\
            ->execute();

$result = $request->getData();

var_dump($result);
