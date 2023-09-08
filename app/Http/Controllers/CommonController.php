<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{

    public static $monthNames = [
        'long' => [
            1 => 'Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'
        ],
        'short' => [
            1 => 'Jan', 'Peb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nop', 'Des'
        ]        
    ];


    public static $tableColumns = [
        'q_sla_kepesertaan' => [
            'kd_Karyawan',
            'Nama_karyawan',
            'kd_perusahaan',
            'kd_jabatan',
            'nama_jabatan',
            'kd_kls_asuransi',
            'nama_layanan',
            'Keterangan',
            'kl_kls',
            'presmi_per_bulan_perorangan',
            'Premi_per_tahun_perorangan',
            'presmi_per_bulan_keluarga',
            'Premi_per_tahun_keluarga',
            'pagu_perorangan',
            'pagu_perorangan_keluarga',
            'tarif_rs_permalam'            
        ],
        'mt_kepesertaan' => [
            'Nama_karyawan',
            'kd_perusahaan',
            'kd_jabatan',
            'tgl_lahir',
            'nama_jabatan',
            'id_dc_kawin',
            'id_dc_gender',
            'id_dc_agama',
            'Keterangan',
            'id_dc_gol_darah',
            'alergi',
            'foto',
            'id_cabang_perusahaan',
            'no_ktp',
            'no_polis',
            'status',
            'kd_sla'
        ]
    ];


    public static function getPagination($current_page, $total_pages, $url='')
    {
        $links = '<nav><ul class="pagination">';

        for($hitung=1; $hitung <= $total_pages; $hitung++){
            if ($hitung == $current_page){
                $links .= '<li class="page-item active"><a class="page-link" data-id="' . $hitung . '">' . $hitung . '</a></li>';
            } else {
                $links .= '<li class="page-item"><a class="page-link" data-id="' . $hitung . '">' . $hitung . '</a></li>';
            }            
        }

        $links .= '</ul></nav>';

        return $links;
    }


    public static function getPagination20230108($current_page, $total_pages, $url)
    {
        $links = '<nav><ul class="pagination">';

        if ($total_pages >= 1 && $current_page <= $total_pages) {
            $links .= '<li class="page-item"><a class="page-link testong" data-id="' . $current_page . '">' . $current_page . '</a></li>';
            
            $i = max(2, $current_page - 5);
            
            if ($i > 2)
                $links .= " ... ";
            
                for (; $i < min($current_page + 6, $total_pages); $i++) {
                $links .= '<li class="page-item"><a class="page-link testing" data-id="' . $i . '">' . $i . '</a></li>';
            }

            if ($i != $total_pages)
                $links .= " ... ";

            $links .= '<li class="page-item"><a class="page-link" data-id="' .$total_pages . '">' . $total_pages . '</a></li>';
        }

        $links .= '</ul></nav>';

        return $links;
    }


    public static function getPaginationWithAdjacents($page = 1, $totalitems, $limit = 5, $adjacents = 2, $targetpage = "/", $pagestring = "?page=")
    {
        // defaults
        if (!$adjacents) $adjacents = 1;
        if (!$limit) $limit = 5;
        if (!$page) $page = 1;
        if (!$targetpage) $targetpage = "/";

        // other vars
        $prev = $page - 1;                                    // previous page is page - 1
        $next = $page + 1;                                    // next page is page + 1
        $lastpage = ceil($totalitems / $limit);               // lastpage is = total items / items per page, rounded up.
        $lpm1 = $lastpage - 1;                                // last page minus 1

        $margin = 0;
        $padding = 0;

        /* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	    */
        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<div class=\"pagination\"";
            if ($margin || $padding) {
                $pagination .= " style=\"";
                if ($margin)
                    $pagination .= "margin: $margin;";
                if ($padding)
                    $pagination .= "padding: $padding;";
                $pagination .= "\"";
            }
            $pagination .= ">";

            // previous button
            if ($page > 1)
                $pagination .= "<a href=\"$targetpage$pagestring$prev\">Prev</a>";
            else
                $pagination .= "<span class=\"disabled\">Prev</span>";

            // pages	
            if ($lastpage < 7 + ($adjacents * 2))    // not enough pages to bother breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"" . $targetpage . $pagestring . $counter . "\">$counter</a>";
                }
            } elseif ($lastpage >= 7 + ($adjacents * 2))    // enough pages to hide some
            {
                // close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 3)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"" . $targetpage . $pagestring . $counter . "\">$counter</a>";
                    }
                    $pagination .= "<span class=\"elipses\">...</span>";
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . $lpm1 . "\">$lpm1</a>";
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . $lastpage . "\">$lastpage</a>";
                }
                // in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . "1\">1</a>";
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . "2\">2</a>";
                    $pagination .= "<span class=\"elipses\">...</span>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"" . $targetpage . $pagestring . $counter . "\">$counter</a>";
                    }
                    $pagination .= "...";
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . $lpm1 . "\">$lpm1</a>";
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . $lastpage . "\">$lastpage</a>";
                }
                // close to end; only hide early pages
                else {
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . "1\">1</a>";
                    $pagination .= "<a href=\"" . $targetpage . $pagestring . "2\">2</a>";
                    $pagination .= "<span class=\"elipses\">...</span>";
                    for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"" . $targetpage . $pagestring . $counter . "\">$counter</a>";
                    }
                }
            }

            // next button
            if ($page < $counter - 1)
                $pagination .= "<a href=\"" . $targetpage . $pagestring . $next . "\">Next</a>";
            else
                $pagination .= "<span class=\"disabled\">Next</span>";
            $pagination .= "</div>\n";
        }

        return $pagination;
    }


    public static function getDiggStylePagination($currentPage, $firstPage, $totalPages, \Closure $url, $adjacents = 1, array $classes = [])
    {

        $pagination = [];

        if ($currentPage > $firstPage) {
            $pagination[] = [
                'class' => $classes + ['previous'],
                'link'  => $url($currentPage - 1),
                'item'  => '«',
            ];
        } else {
            $pagination[] = [
                'class' => $classes + ['disabled'],
                'link'  => null,
                'item'  => '«',
            ];
        }

        if ($totalPages < 7 + ($adjacents * 2)) {

            for ($p = 1; $p <= $totalPages; $p++) {
                if ($currentPage == $p) {
                    $pagination[] = [
                        'class' => $classes + ['active'],
                        'link'  => $url($p),
                        'item'  => $p,
                    ];
                } else {
                    $pagination[] = [
                        'class' => $classes + ['page'],
                        'link'  => $url($p),
                        'item'  => $p,
                    ];
                }
            }
        } elseif ($totalPages >= 7 + ($adjacents * 2)) {

            if ($currentPage < 1 + ($adjacents * 3)) {
                for ($p = 1; $p < 4 + ($adjacents * 2); $p++) {
                    if ($currentPage == $p) {
                        $pagination[] = [
                            'class' => $classes + ['active'],
                            'link'  => $url($p),
                            'item'  => $p,
                        ];
                    } else {
                        $pagination[] = [
                            'class' => $classes + ['page'],
                            'link'  => $url($p),
                            'item'  => $p,
                        ];
                    }
                }

                $pagination[] = [
                    'class' => $classes + ['disabled'],
                    'link'  => null,
                    'item'  => '&hellip;',
                ];

                $pagination[] = [
                    'class' => $classes + ['page'],
                    'link'  => $url($totalPages - 1),
                    'item'  => $totalPages - 1,
                ];

                $pagination[] = [
                    'class' => $classes + ['page'],
                    'link'  => $url($totalPages),
                    'item'  => $totalPages,
                ];
            } elseif ($totalPages - ($adjacents * 2) > $currentPage && $currentPage > ($adjacents * 2)) {

                $pagination[] = [
                    'class' => $classes + ['page'],
                    'link'  => $url(1),
                    'item'  => 1,
                ];

                $pagination[] = [
                    'class' => $classes + ['page'],
                    'link'  => $url(2),
                    'item'  => 2,
                ];

                $pagination[] = [
                    'class' => $classes + ['disabled'],
                    'link'  => null,
                    'item'  => '&hellip;',
                ];

                for ($p = $currentPage - $adjacents; $p <= $currentPage + $adjacents; $p++) {
                    if ($currentPage == $p) {
                        $pagination[] = [
                            'class' => $classes + ['active'],
                            'link'  => $url($p),
                            'item'  => $p,
                        ];
                    } else {
                        $pagination[] = [
                            'class' => $classes + ['page'],
                            'link'  => $url($p),
                            'item'  => $p,
                        ];
                    }
                }

                $pagination[] = [
                    'class' => $classes + ['disabled'],
                    'link'  => null,
                    'item'  => '&hellip;',
                ];

                $pagination[] = [
                    'class' => $classes + ['page'],
                    'link'  => $url($totalPages - 1),
                    'item'  => $totalPages - 1,
                ];

                $pagination[] = [
                    'class' => $classes + ['page'],
                    'link'  => $url($totalPages),
                    'item'  => $totalPages,
                ];
            } else {

                $pagination[] = [
                    'class' => $classes + ['page'],
                    'link'  => $url(1),
                    'item'  => 1,
                ];

                $pagination[] = [
                    'class' => $classes + ['page'],
                    'link'  => $url(2),
                    'item'  => 2,
                ];

                $pagination[] = [
                    'class' => $classes + ['disabled'],
                    'link'  => null,
                    'item'  => '&hellip;',
                ];

                for ($p = $totalPages - (1 + ($adjacents * 3)); $p <= $totalPages; $p++) {

                    if ($currentPage == $p) {
                        $pagination[] = [
                            'class' => $classes + ['active'],
                            'link'  => $url($p),
                            'item'  => $p,
                        ];
                    } else {
                        $pagination[] = [
                            'class' => $classes + ['page'],
                            'link'  => $url($p),
                            'item'  => $p,
                        ];
                    }
                }
            }
        }

        if ($currentPage < $totalPages) {
            $pagination[] = [
                'class' => $classes + ['next'],
                'link'  => $url($currentPage + 1),
                'item'  => '»',
            ];
        }

        return $pagination;
    }


    public static function getCustomPagination($page, $numRecords, $limit = 5, $numPages, $adjacents = 3)
    {

        $str  = '<nav aria-label="Page navigation"><ul class="pagination">';
        for ($hitung = 1; $hitung <= $numPages; $hitung++) {
            $prev = '<li class="page-item"><a data-id="' . $hitung - 1 . '" class="page-link">Prev</a></li>';
            $prev = '<li class="page-item"><a data-id="' . $hitung + 1 . '" class="page-link">Next</a></li>';
            if ($hitung == $page) {
                $str .= '<li class="page-item active"><a data-id="' . $hitung . '" class="page-link">' . $hitung . '</a></li>';
            } else {
                $str .= '<li class="page-item"><a data-id="' . $hitung . '" class="page-link">' . $hitung . '</a></li>';
            }
        }
        $str .= '</ul></nav>';
        return $str;
    }


    public static function getOldPagination($page, $numRecords, $limit = 5, $numPages, $adjacents = 3)
    {
        $str  = '<nav aria-label="Page navigation"><ul class="pagination">';

        $adjRight = [];
        for ($xr = 0; $xr < $adjacents; $xr++) {
            $xr1 = $xr + 1;
            $adjRight[$xr] = $xr1 + $page;
        }

        $adjLeft = [];
        for ($xl = 0; $xl < $adjacents; $xl++) {
            $xl1 = $xl + 1;
            $adjLeft[$xl] = $xl1 + $page;
        }

        $ki3 = $page - 3;
        $ki2 = $page - 2;
        $ki1 = $page - 1;

        $ka3 = $page + 3;
        $ka2 = $page + 2;
        $ka1 = $page + 1;

        if ($page >= $adjacents) {
            $kiri3  = '<li class="page-item"><a data-id="' . $ki3 . '" class="page-link">' . $ki3 . '</a></li>';
            $kiri2  = '<li class="page-item"><a data-id="' . $ki2 . '" class="page-link">' . $ki2 . '</a></li>';
            $kiri1  = '<li class="page-item"><a data-id="' . $ki1 . '" class="page-link">' . $ki1 . '</a></li>';
        } else {
            if ($page == 2) {
                $kiri3 = '';
                $kiri2 = '';
                $kiri1  = '<li class="page-item"><a data-id="' . $ki1 . '" class="page-link">' . $ki1 . '</a></li>';
            } else {
                $kiri3 = '';
                $kiri2 = '';
                $kiri1 = '';
            }
        }

        $tengah = '<li class="page-item active"><a data-id="0" class="page-link">' . $page . '</a></li>';

        $min3 = $numPages - $adjacents;

        if ($page == $numPages) {
            $kanan3 = '';
            $kanan2 = '';
            $kanan1 = '';
        } else {
            if ($page == $numPages - 1) {
                $kanan1  = '<li class="page-item"><a data-id="' . $ka1 . '" class="page-link">' . $ka1 . '</a></li>';
                $kanan2 = '';
                $kanan3 = '';
            } else {
                $kanan1  = '<li class="page-item"><a data-id="' . $ka1 . '" class="page-link">' . $ka1 . '</a></li>';
                $kanan2  = '<li class="page-item"><a data-id="' . $ka2 . '" class="page-link">' . $ka2 . '</a></li>';
                $kanan3  = '<li class="page-item"><a data-id="' . $ka3 . '" class="page-link">' . $ka3 . '</a></li>';
            }
        }

        $str .= $kiri2 . $kiri1 . $tengah . $kanan1 . $kanan2;
        $str .= '</ul></nav>';

        return $str;
    }

    /**
     * Return Boostrap 5 pagination style
     * 
     * @param integer $page       Current page
     * @param integer $totalitems Total number of item data
     * @param integer $limit      Number of rows per page
     * @param integer $adjacents  Number of page in the right and left side
     * @param string  $targetpage Target URL
     * @param sting   $pagestring Query string after target page
     * 
     * @return string
     */
    public static function getPaginationString($page = 1, $totalitems, $limit = 15, $adjacents = 1, $targetpage = "/", $pagestring = "?page=")
    {
        // defaults
        if (!$adjacents) $adjacents = 1;
        if (!$limit) $limit = 15;
        if (!$page) $page = 1;
        if (!$targetpage) $targetpage = "/";

        // other vars
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($totalitems / $limit);
        $lpm1 = $lastpage - 1; //last page minus 1

        $pagination = '';

        if ($lastpage > 1) {
            $pagination .= '<nav aria-label="Page navigation"><ul class="pagination">';

            // previous button
            if ($page > 1) {
                $pagination .= '<li class="page-item"><a data-id="' . $page . '" class="page-link">Prev</a></li>';
            } else {
                // $pagination .= '<li class="page-item"><a class="page-link">Prev</a></li>';
            }

            // pages	
            if ($lastpage < 7 + ($adjacents * 2)) {
                // not enough pages to bother breaking it up
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page) {
                        $pagination .= '<li class="page-item active"><a data-id="0" class="page-link">' . $counter . '</a></li>';
                    } else {
                        $pagination .= '<li class="page-item"><a data-id="' . $page . '" class="page-link">' . $counter . '</a></li>';
                    }
                }
            } elseif ($lastpage >= 7 + ($adjacents * 2)) {
                // enough pages to hide some 
                // close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 3)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page) {
                            $pagination .= '<li class="page-item active"><a data-id="0" class="page-link">' . $counter . '</a></li>';
                        } else {
                            $pagination .= '<li class="page-item"><a data-id="' . $page . '" class="page-link">' . $counter . '</a></li>';
                        }
                    }

                    $pagination .= '<li class="page-item"><a data-id="0" class="page-link">...</a></li>';
                    $pagination .= '<li class="page-item"><a data-id="' . $lpm1 . '" class="page-link">' . $lpm1 . '</a></li>';
                    $pagination .= '<li class="page-item"><a data-id="' . $lastpage . '" class="page-link">' . $lastpage . '</a></li>';
                } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    // in middle; hide some front and some back
                    // $pagination .= '<li class="page-item"><a data-id="1" class="page-link">1</a></li>';
                    // $pagination .= '<li class="page-item"><a data-id="2" class="page-link">2</a></li>';
                    $pagination .= '<li class="page-item"><a class="page-link">...</a></li>';

                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination .= '<li class="page-item active"><a data-id="0" class="page-link">' . $counter . '</a></li>';
                        else
                            $pagination .= '<li class="page-item"><a data-id="' . $page . '" class="page-link">' . $counter . '</a></li>';
                    }

                    $pagination .= '<li class="page-item"><a data-id="0" class="page-link">...</a></li>';
                    $pagination .= '<li class="page-item"><a data-id="' . $lpm1 . '" class="page-link">' . $lpm1 . '</a></li>';
                    $pagination .= '<li class="page-item"><a data-id="' . $lastpage . '" class="page-link">' . $lastpage . '</a></li>';
                } else {
                    // close to end; only hide early pages
                    // $pagination .= '<li class="page-item"><a data-id="1" class="page-link">1</a></li>';
                    // $pagination .= '<li class="page-item"><a data-id="2" class="page-link">2</a></li>';
                    $pagination .= '<li class="page-item"><a data-id="0" class="page-link">...</a></li>';

                    for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page) {
                            $pagination .= '<li class="page-item active"><a data-id="' . $page . '" class="page-link">' . $counter . '</a></li>';
                        } else {
                            $pagination .= '<li class="page-item"><a data-id="' . $page . '" class="page-link">' . $counter . '</a></li>';
                        }
                    }
                }
            }

            // next button
            if ($page < $counter - 1) {
                $pagination .= '<li class="page-item"><a class="page-link">Next</a></li>';
            } else {
                $pagination .= '<li class="page-item"><a class="page-link">Next</a></li>';
            }

            $pagination .= '</ul></nav>';
        }

        return $pagination;
    }


    /**
     * Format date for display purpose
     * 
     * @param boolean $longFormat Whether to use long (month name) or short (month name) format
     * @param boolean $withDay    Whether to display day or not
     * @param string  $strDate    Source date (in 'yyyy-mm-dd' format, or 'now' to use current date)
     * 
     * @return string
     */

    public static function now($longFormat=true, $withDay=false, $strDate='now')
    {
        if ($strDate == null){
            return '';
        }
        
        if ($strDate == 'now'){
            $year   = date("Y");
            $month  = date("n");
            $day    = date("j");    
        } else {
            $arrDate = explode("-", $strDate);
            $year   = $arrDate[0];
            $month  = $arrDate[1];

            if (substr($month, 0, 1) == '0'){
                $month = substr($month, 1, 1);
            }
            
            $day    = $arrDate[2];
        }

        if ($longFormat == true){
            $monthName = SELF::$monthNames['long'][$month];
        } else {
            $monthName = SELF::$monthNames['short'][$month];
        }

        if ($withDay == true){
            $today = $day . ' ' . $monthName . ' ' . $year;
        } else {
            $today = $monthName . ' ' . $year;
        }
        
        return $today;
    }
}
