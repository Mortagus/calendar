<?php

namespace App\Controller;

use App\Utils\Calendar;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends Controller
{
    /**
     * @Route("/calendar", name="calendar.default_show")
     * @Route("/calendar/{year}/{month}", name="calendar.show")
     *
     * @param int $year
     * @param int $month
     * @return Response
     * @throws \Exception
     */
    public function showCalendar($year = null, $month = null)
    {
        $calendar = new Calendar($month, $year);
        return $this->render('Calendar/show.html.twig', [
                'calendar' => $calendar,
                'currentCalendarDay' => $calendar->getFirstDayToDisplay(),
                'oneDayInterval' => new \DateInterval('P1D')
            ]);
    }
}