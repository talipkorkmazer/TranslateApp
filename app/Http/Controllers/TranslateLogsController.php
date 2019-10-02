<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Yandex\Translate\Translator;
use Yandex\Translate\Exception;

class TranslateLogsController extends Controller
{

    CONST API_KEY = "trnsl.1.1.20191002T074040Z.a1c380ca820bbdd8.4200ed956fd6839c41a7c95067a3721c742b06cf";
    CONST API_URL = "https://translate.yandex.net/api/v1.5/tr.json/translate";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {
            $translator = new Translator(self::API_KEY);
            $languages = $translator->getSupportedLanguages('tr');

        } catch (\Exception $e) {
            return view('home', [
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }

        return view('home', [
            'status' => true,
            'languages' => $languages['langs']
        ]);

    }

    public function translate(Request $request) {

        try {
            $requestCount =  $request->session()->get('requestCount');
            if ($requestCount  == 3) {
                $request->session()->put('requestCount', 0);

                return view('translate', [
                    'message' => "Request count exceed, only 3 request can be permitted, for test: count reset to the zero again.",
                    'status' => false
                ]);
            }

            $request->session()->put('requestCount', $requestCount + 1);

            $params = $request->all();
            $sourceLang = (isset($params['source_lang']) ?  $params['source_lang'] . '-' : '');
            $lang = $sourceLang . $params['target_lang'];

            $translator = new Translator(self::API_KEY);
            $translation = $translator->translate($params['translate_text'], $lang);
            $searchedTextArray = explode(' ', $params['search_text']);
            $searchedTextBoldArray = array_map(function($val) { return "<b>" . $val . "</b>"; }, $searchedTextArray);

            $newText = str_replace($searchedTextArray, $searchedTextBoldArray, $translation);

            return view('translate', [
                'status' => true,
                'text' => $newText
            ]);

        } catch (Exception $e) {
            return view('translate', [
                'message' => $e->getMessage(),
                'status' => false
            ]);
        }

    }
}

?>
