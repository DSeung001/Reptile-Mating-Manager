<?php
namespace App\Repositories;

interface EggRepositoryInterface extends BaseRepositoryInterface{
    public function list($condition = [], $pagination = 10);

    /**
     * 전체 알 중에서 해당 메이팅에 포함된 알이 있는 지
     * @param $matingId
     * @return mixed
     */
    public function belongMating($matingId);

    /**
     * 메이팅 아이디로 부개체 가져오기
     * @param $matingId
     * @return mixed
     */
    public function getFatherNameByMatingId($matingId);


    /**
     * 메이팅 아이디로 모개체 가져오기
     * @param $matingId
     * @return mixed
     */
    public function getMatherNameByMatingId($matingId);

    /**
     * 부화 예정일 리스트 가져오기
     * @return mixed
     */
    public function getHatchingScheduled();
}