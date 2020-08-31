<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Support\ApiForceGateWay;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request 
     * @param ApiForceGateWay data from api 
     */
    public function index(Request $request, ApiForceGateWay $api) : view
    {
        $filter = $request->input('filter');
        $items = $api->getData();
        $contacts = $items['contacts'];

        if ($filter === 'desc') {
            $filter = SORT_DESC;
        } else {
            // default setting is asc
            $filter = SORT_ASC;
        }

        $columns = array_column($items['contacts'] , 'name');
        array_multisort($columns, $filter, $contacts);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $paginatedItems = $this->paginator(5, $currentPage, $contacts);

        return view('site.home')
            ->with('page', $paginatedItems)
        ;
    }

    public function paginator(Int $perPage = 5, $currentPage, Array $data) : LengthAwarePaginator 
    {
        $currentItems = array_slice($data,
            $perPage * ($currentPage - 1),
            $perPage);
        
        $paginator = new LengthAwarePaginator(
            $currentItems,
            count($data),
            $perPage,
            $currentPage
        );

        return $paginator;
    }

    public function search(Request $request, ApiForceGateWay $api)
    {
        $items = $api->getData();

        $validateData = $request->validate([
            'search' => 'required',
        ]);
        // Will need better regex pattern for search so far just defined boundry 
        $pattern = '/\b' . $request->search . '\b/i';
        $matches = array_filter($items['contacts'], function($a) use($pattern)  {

            return preg_grep($pattern, $a);
        });

        $filter = $request->input('filter');

        if ($filter === 'desc') {
            $filter = SORT_DESC;
        } else {
            // default setting is asc
            $filter = SORT_ASC;
        }

        $columns = array_column($matches, 'name');
        array_multisort($columns, $filter, $matches);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $paginatedItems = $this->paginator(5, $currentPage, $matches);

        return view('site.home')
            ->with('page', $paginatedItems)
        ;        
    }
}
