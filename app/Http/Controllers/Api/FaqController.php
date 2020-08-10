<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryFaq\CategoryFaqCollection;
use App\Http\Resources\Faq\Faq;
use App\Http\Resources\Faq\FaqCollection;
use App\Repositories\Eloquent\CategoryFaq\CategoryFaqRepository;
use App\Repositories\Eloquent\Faq\FaqRepository;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct(FaqRepository $faqRepository, CategoryFaqRepository $categoryFaqRepository)
    {
        $this->faqRepository = $faqRepository;
        $this->categoryFaqRepository = $categoryFaqRepository;
        $this->middleware('auth:api');
    }

    /**
     * Handle the incoming request.
     * @return Response
     */
    public function index(Request $request)
    {
        $category = $this->categoryFaqRepository->all();
        $faq = $this->faqRepository->instance();
        if ($request->filled("category_id")) {
            $faq = $faq->where("category_faq_id", $request->category_id);
        }
        if ($request->filled("search")) {
            $faq = $faq->where("question", 'Like', "%" . $request->search . "%");
        }
        $faq = $faq->orderBy("id", "desc")->paginate();
        $data['category'] = new CategoryFaqCollection($category);
        $data['faqs'] = new FaqCollection($faq);
        return $this->apiResponse($data, true, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $show = $this->faqRepository->find($id);
        return $this->apiResponse(new Faq($show), true, 200);
    }
}
