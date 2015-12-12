<?php

namespace app\module\input\models;

use Yii;

/**
 * This is the model class for table "{{%auction}}".
 *
 * @property integer $ID
 * @property string $DepartID
 * @property string $Type
 * @property string $Year
 * @property string $CaseNumber
 * @property string $Supervise
 * @property string $SuperviseTel
 * @property string $FlowNumber
 * @property string $Case
 * @property string $LitigantOne
 * @property string $LitigantTwo
 * @property string $EntrustDeparment
 * @property string $Undertaker
 * @property string $UndertakerTel
 * @property string $TransferMaterial
 * @property string $SubjectMatter
 * @property string $Agency
 * @property string $ChoiceWay
 * @property string $CaseClosedDate
 * @property string $PutOnRecordDate
 * @property string $GetbackDate
 * @property string $EntrustDate
 * @property string $Progress
 * @property string $AnnouncementDate1
 * @property string $TimeDate1
 * @property string $Status1
 * @property string $StartAuctionPrice1
 * @property string $Price1
 * @property string $AnnouncementDate2
 * @property string $TimeDate2
 * @property string $Status2
 * @property string $StartAuctionPrice2
 * @property string $Price2
 * @property string $AnnouncementDate3
 * @property string $TimeDate3
 * @property string $Status3
 * @property string $StartAuctionPrice3
 * @property string $Price3
 * @property string $AuctionStatus
 * @property string $AuctionPrice
 * @property string $AuctionDate
 * @property string $ArrivalDate
 * @property string $ArrivalCycle
 * @property string $SuspendedDate
 * @property string $RetractDate
 * @property string $Fee
 * @property string $Auctioneer
 * @property string $ChargesDate
 * @property integer $Cycle
 * @property string $FllowResult
 * @property string $Remark
 * @property integer $GetbackCycle
 * @property integer $PutOnRecordCycle
 * @property integer $EntrustCycle
 * @property string $SaleDate
 * @property string $SalePrice
 * @property string $SaleStatus
 */
class Auction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $type = "拍卖";

    public static function tableName()
    {
        return '{{%auction}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartID', 'Year', 'CaseNumber', 'FlowNumber', 'Case', 'SaleDate', 'SalePrice', 'SaleStatus'], 'required'],
            [['Cycle', 'GetbackCycle', 'PutOnRecordCycle', 'EntrustCycle'], 'integer'],
            [['DepartID', 'StartAuctionPrice1', 'Price1', 'StartAuctionPrice2', 'Price2', 'StartAuctionPrice3', 'Price3', 'AuctionPrice', 'Fee', 'SalePrice'], 'number'],
            [['SubjectMatter', 'Remark'], 'string'],
            [['CaseClosedDate', 'PutOnRecordDate', 'GetbackDate', 'EntrustDate', 'AnnouncementDate1', 'TimeDate1', 'AnnouncementDate2', 'TimeDate2', 'AnnouncementDate3', 'TimeDate3', 'AuctionDate', 'ArrivalDate', 'ArrivalCycle', 'SuspendedDate', 'RetractDate', 'ChargesDate', 'SaleDate'], 'safe'],
            [['Type', 'AuctionStatus', 'SaleStatus'], 'string', 'max' => 10],
            [['Year'], 'string', 'max' => 12],
            [['CaseNumber', 'FlowNumber', 'Case', 'LitigantOne', 'LitigantTwo', 'TransferMaterial'], 'string', 'max' => 255],
            [['Supervise', 'SuperviseTel', 'Undertaker', 'UndertakerTel', 'ChoiceWay', 'FllowResult'], 'string', 'max' => 50],
            [['EntrustDeparment'], 'string', 'max' => 128],
            [['Agency'], 'string', 'max' => 100],
            [['Progress'], 'string', 'max' => 36],
            [['Status1', 'Status2', 'Status3'], 'string', 'max' => 18],
            [['Master'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DepartID' => '部门ID',
            'Type' => '类型评估',
            'Year' => '年度',
            'CaseNumber' => '原审案号',
            'Supervise' => '督办人',
            'SuperviseTel' => '督办人电话',
            'FlowNumber' => '委托案号',
            'Case' => '案由',
            'LitigantOne' => '当事人1',
            'LitigantTwo' => '当事人2',
            'EntrustDeparment' => '委托部门',
            'Undertaker' => '承办人',
            'UndertakerTel' => '承办人电话',
            'TransferMaterial' => '移交材料',
            'SubjectMatter' => '标的物',
            'Agency' => '拍卖机构',
            'ChoiceWay' => '选定方式',
            'CaseClosedDate' => '收案日期',
            'PutOnRecordDate' => '立案日期',
            'GetbackDate' => '结案日期',
            'EntrustDate' => '委托日期',
            'Progress' => '进度',
            'AnnouncementDate1' => '第一次公告日期',
            'TimeDate1' => '第一次拍卖日期',
            'Status1' => '第一次拍卖状态',
            'StartAuctionPrice1' => '第一次起拍价',
            'Price1' => '第一次拍卖价',
            'AnnouncementDate2' => '第二次公告日期',
            'TimeDate2' => '第二次拍卖日期',
            'Status2' => '第二次拍卖状态',
            'StartAuctionPrice2' => '第二次起拍价',
            'Price2' => '第二次拍卖价',
            'AnnouncementDate3' => '第三次公告日期',
            'TimeDate3' => '第三次拍卖日期',
            'Status3' => '第三次拍卖状态',
            'StartAuctionPrice3' => '第三次起拍价',
            'Price3' => '第三次拍卖价',
            'AuctionStatus' => '拍卖状态',
            'AuctionPrice' => '拍卖价格',
            'AuctionDate' => '拍卖日期',
            'ArrivalDate' => '拍卖款到帐日期',
            'ArrivalCycle' => '到帐周期',
            'SuspendedDate' => '暂缓日期',
            'RetractDate' => '撤回日期',
            'Fee' => '拍卖费用',
            'Master' => '拍卖师',
            'ChargesDate' => '缴费日期',
            'Cycle' => '拍卖周期',
            'FllowResult' => '跟踪评查情况',
            'Remark' => '备注',
            'GetbackCycle' => '结案周期',
            'PutOnRecordCycle' => '立案周期',
            'EntrustCycle' => '委托周期',
            'SaleDate' => '变卖日期',
            'SalePrice' => '变卖价格',
            'SaleStatus' => '变卖状态',
        ];
    }

    public static function tableTh(){

                return [
                    'No' => '序号',
                    'Cycle' => '拍卖周期',
                    'Progress' => '进度',
                    'CaseNumber' => '拍卖案号',
                    'EntrustDeparment' => '委托部门',
                    'FlowNumber' => '委托案号',
                    'Case' => '案由',
                    'LitigantOne' => '当事人1',
                    'LitigantTwo' => '当事人2',
                    'SubjectMatter' => '标的物',
                    'CaseClosedDate' => '收案日期',
                    'PutOnRecordDate' => '立案日期',
                    'PutOnRecordCycle' => '立案周期',
                    'EntrustDate' => '委托日期',
                    'EntrustCycle' => '委托周期',
                    'Agency' => '拍卖机构',
                    'TransferMaterial' => '移交材料',
                    'AnnouncementDate1' => '第一次公告日期',                    
                    'StartAuctionPrice1' => '第一次起拍价',
                    'TimeDate1' => '第一次拍卖日期',
                    'AnnouncementDate2' => '第二次公告日期',
                    'StartAuctionPrice2' => '第二次起拍价',                   
                    'TimeDate2' => '第二次拍卖日期',
                    'AnnouncementDate3' => '第三次公告日期',
                    'StartAuctionPrice3' => '第三次起拍价',
                    'TimeDate3' => '第三次拍卖日期',
                    'Price3' => '成交价（万元）',
                    'ArrivalDate' => '拍卖款到帐日期',
                   // 'ArrivalCycle' => '到帐周期',     
                    'Fee' => '拍卖费用',                    
                    'Master' => '拍卖师',                                                      
                    'GetbackDate' => '结案日期',
                    'GetbackCycle' => '结案周期',
                    'SaleDate' => '变卖日期',
                    'SalePrice' => '变卖价格',
                    'SaleStatus' => '变卖状态',
                    'FllowResult' => '跟踪评查情况',   
                    'Undertaker' => '承办人',
                    'UndertakerTel' => '承办人电话',
                    'Supervise' => '督办人',
                    'SuperviseTel' => '督办人电话',
                    'SuspendedDate' => '暂缓日期',
                    'RetractDate' => '撤回日期',
                    'Remark' => '备注',                                                                          
                ];

    }

    public static function progress(){

        return [
            ""=>"选择进度",
            "收卷"=>"收卷",
            "立案"=>"立案",
            "委托"=>"委托",
            "拍卖1"=>"拍卖1",
            "拍卖2"=>"拍卖2",
            "拍卖3"=>"拍卖3",
            "撤拍"=>"撤拍",
        ];
    }

    public static function status(){

        return [
            ""=>"选择拍卖状态",
            "成交"=>"成交",
            "流拍"=>"流拍",
            "撤拍"=>"撤拍",
        ];
    }

    
}
