<?php
/**
 * Created by PhpStorm.
 * User: Benouz
 * Date: 28-04-18
 * Time: 17:47
 */

namespace App\Utils;


class Calendar
{
    const FIRST_MONTH_INDEX = 1;
    const LAST_MONTH_INDEX = 12;
    const FIRST_YEAR_INDEX = 1970;
    const LAST_YEAR_INDEX = 2500;

    const CLASS_DAY_NORMAL = 'normal_day';
    const CLASS_DAY_OTHER = 'other_month_day';
    const CLASS_DAY_CURRENT = 'current_day';

    private $monthNames = [
        'Janvier', 'Février', 'Mars', 'Avril',
        'Mai', 'Juin', 'Juillet', 'Août',
        'Septembre', 'Octobre', 'Novembre', 'Décembre'
    ];

    private $weekDayNames = [
        'Lundi', 'Mardi', 'Mercredi',
        'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'
    ];

    /**
     * @var int $month
     */
    private $month;

    /**
     * @var int $year
     */
    private $year;

    /**
     * Calendar constructor.
     * @param int $month : le mois compris entre 1 et 12
     * @param int $year :
     * @throws \Exception
     */
    public function __construct($month = null, $year = null)
    {
        $this->setMonth($month);
        $this->setYear($year);
    }

    /**
     * Just something to display by default
     *
     * @return string
     */
    public function __toString()
    {
        return $this->monthNames[$this->month - 1] . ' ' . $this->year;
    }

    public function toString()
    {
        return self::class . ' - ' . $this->__toString();
    }

    /**
     * Return the number of weeks for the month designated by the parameters received
     *
     * @return int
     * @throws \Exception
     */
    public function getWeeks()
    {
        $firstDay = $this->getFirstDayOfTheMonth();
        $lastDay = $this->getLastDayOfTheMonth($firstDay);

        $firstDayWeekNumber = intval($firstDay->format('W'));
        $lastDayWeekNumber = intval($lastDay->format('W'));

        if ($lastDayWeekNumber === 1) {
            $lastDayWeekNumber = intval($lastDay->modify('- 7 days')->format('W')) + 1;
        }

        $weekCounter = $lastDayWeekNumber - $firstDayWeekNumber + 1;
        if ($weekCounter < 0) {
            $weekCounter = intval($lastDay->format('W'));
        }

        return $weekCounter;
    }

    /**
     * @return \DateTimeImmutable
     * @throws \Exception
     */
    public function getFirstDayOfTheMonth()
    {
        return new \DateTimeImmutable($this->year . '-' . $this->month . '-01');
    }

    /**
     * @param \DateTimeImmutable $firstDay
     * @return \DateTimeImmutable
     */
    public function getLastDayOfTheMonth(\DateTimeImmutable $firstDay)
    {
        return $firstDay->modify('last day of ' . $firstDay->format('M') . ' ' . $this->year);
    }

    /**
     * @param \DateTimeInterface $day
     * @return \DateTimeImmutable
     * @throws \Exception
     */
    public function getFirstDayToDisplay(\DateTimeInterface $day = null)
    {
        if ($day === null) {
            $day = $this->getFirstDayOfTheMonth();
        }
        return ($day->format('N') === '1') ? $day : $day->modify('last monday');
    }

    /**
     * @return array
     */
    public function getPreviousMonthParameters()
    {
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < self::FIRST_MONTH_INDEX) {
            $month = self::LAST_MONTH_INDEX;
            $year -= 1;
        }

        return ['month' => $month, 'year' => $year];
    }

    /**
     * @return array
     */
    public function getNextMonthParameters()
    {
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > self::LAST_MONTH_INDEX) {
            $month = self::FIRST_MONTH_INDEX;
            $year += 1;
        }

        return ['month' => $month, 'year' => $year];
    }

    /**
     * @param \DateTimeInterface $currentCalendarDay
     * @return string
     */
    public function getClassForTheDay(\DateTimeInterface $currentCalendarDay)
    {
        if (!$this->isWithinMonth($currentCalendarDay)) {
            return self::CLASS_DAY_OTHER;
        }

        if ($this->isToday($currentCalendarDay)) {
            return self::CLASS_DAY_CURRENT;
        }

        return self::CLASS_DAY_NORMAL;
    }

    /**
     * @param \DateTimeInterface $day
     * @return bool
     */
    public function isWithinMonth(\DateTimeInterface $day)
    {
        $monthToTest = intval($day->format('m'));

        return $monthToTest == $this->month;
    }

    /**
     * @param \DateTimeInterface $day
     * @return bool
     */
    public function isToday(\DateTimeInterface $day)
    {
        $today = new \DateTime();

        return $day->format('Y-m-d') == $today->format('Y-m-d');
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $month
     * @return Calendar
     * @throws \Exception
     */
    public function setMonth($month): Calendar
    {
        $month = $this->sanitizeMonth($month);
        $this->checkMonth($month);
        $this->month = $month;

        return $this;
    }

    /**
     * @param $month
     * @return int
     */
    private function sanitizeMonth($month)
    {
        if ($month === null) {
            $month = date('m');
        }

        return intval($month);
    }

    /**
     * @param $month
     * @throws \Exception
     */
    private function checkMonth($month)
    {
        if ($month < self::FIRST_MONTH_INDEX || $month > self::LAST_MONTH_INDEX) {
            throw new \Exception('[' . $month . '] is an invalid month value.');
        }
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return Calendar
     * @throws \Exception
     */
    public function setYear($year): Calendar
    {
        $year = $this->sanitizeYear($year);
        $this->checkYear($year);
        $this->year = $year;

        return $this;
    }

    /**
     * @param $year
     * @return int
     */
    private function sanitizeYear($year)
    {
        if ($year === null) {
            $year = date('Y');
        }

        return intval($year);
    }

    /**
     * @param $year
     * @throws \Exception
     */
    private function checkYear($year)
    {
        if ($year < self::FIRST_YEAR_INDEX || $year > self::LAST_YEAR_INDEX) {
            throw new \Exception('[' . $year . '] is an invalid year value.');
        }
    }

    /**
     * @return array
     */
    public function getMonthNames(): array
    {
        return $this->monthNames;
    }

    /**
     * @param array $monthNames
     * @return Calendar
     */
    public function setMonthNames(array $monthNames): Calendar
    {
        $this->monthNames = $monthNames;

        return $this;
    }

    /**
     * @return array
     */
    public function getWeekDayNames(): array
    {
        return $this->weekDayNames;
    }

    /**
     * @param array $weekDayNames
     * @return Calendar
     */
    public function setWeekDayNames(array $weekDayNames): Calendar
    {
        $this->weekDayNames = $weekDayNames;

        return $this;
    }
}