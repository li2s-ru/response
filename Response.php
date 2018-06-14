<?

class Response
{
    public $url;
    public $format;

    public $jsonDecode = false;
    public $jsonAsArray = true;

    public $encoded = false;
    public $charset = null;

    private $site = "https://li2s.ru/api/";
    private $data;

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

            if ($this->encoded && !empty($this->charset)) {
                $response = $this->formatResponse($response, $this->charset);
            }

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

    public function formatResponse($text, $outCharset = "CP1251", $inCharset = "UTF-8")
    {
        return iconv($inCharset, $outCharset, $text);
    }
}