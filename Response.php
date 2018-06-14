<?

class Response
{
    public $url;
    public $format;

    public $jsonDecode = false;
    public $jsonAsArray = true;

    private $site = "https://li2s.ru/api/";
    private $data;

    public function __construct()
    {
    }

    public function execute()
    {
        $this->prepareData();

        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_URL, $this->site);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($this->data));
            $response = curl_exec($curl);
            curl_close($curl);

            if ($this->jsonDecode) {
                return json_decode($response, $this->jsonAsArray);
            }
            return $response;
        }
    }

    public function prepareData()
    {
        $this->data = [
            "url" => $this->url
        ];
        // Установим переданный формат ответа
        if (!empty($this->format)) {
            $this->data['format'] = $this->format;
        }
    }

    public function formatResponse($text, $inCharset = "UTF-8", $outCharset = "CP1251")
    {
        return iconv($inCharset, $outCharset, $text);
    }
}