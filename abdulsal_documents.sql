-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2019 at 10:35 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdulsal_documents`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `always_allowed` tinyint(1) NOT NULL DEFAULT '1',
  `alias` varchar(255) NOT NULL,
  `is_hidden` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `name`, `parent_id`, `always_allowed`, `alias`, `is_hidden`) VALUES
(1, 'login', 0, 0, 'التحقق', 0),
(2, 'login', 1, 1, 'تسجيل الدخول', 0),
(3, 'logout', 1, 1, 'تسجيل الخروج', 0),
(14, 'reports', 0, 0, 'Reports', 0),
(15, 'message', 0, 0, 'Message', 0),
(37, 'employees', 0, 0, 'الموظفين', 0),
(38, 'add', 37, 0, 'اضافة موظف', 0),
(39, 'edit', 37, 0, 'تعديل موظف', 0),
(40, 'delete', 37, 0, 'حذف الموظف', 0),
(41, 'view_client', 37, 0, 'عرض الموظف', 0),
(42, 'admin_role', 0, 0, 'انواع المستخدمين', 0),
(43, 'add', 42, 0, 'اضافة نوع مستخدم', 0),
(44, 'edit', 42, 0, 'تعديل المستخدم', 0),
(45, 'delete', 42, 0, 'حذف المستخدم', 0),
(50, 'permissions', 0, 0, 'الصلاحيات', 0),
(79, 'settings', 0, 0, 'Settings', 0),
(111, 'send', 15, 0, 'ارسال رسالة', 0),
(271, 'schools', 0, 0, 'المدارس', 0),
(272, 'add', 271, 0, 'اضافة مدرسة', 0),
(273, 'edit', 271, 0, 'تعديل المدرسة', 0),
(274, 'delete', 271, 0, 'حذف المدرسة', 0),
(275, 'technical', 271, 0, 'البيانات الفنية للمدرسة', 0),
(276, 'list_employee', 271, 0, 'قائمة مستخدمي المدرسة', 0),
(277, 'student_gift', 0, 0, 'الطلاب الموهوبين', 0),
(278, 'lists', 277, 127, 'قائمة الطلاب الموهوبين', 0),
(279, 'teachers', 271, 0, 'المعلمين', 0),
(280, 'supervisors', 271, 0, 'المشرفين', 0),
(281, 'awards', 271, 0, 'عرض جوائز المدرسة', 0),
(282, 'awards_add', 271, 0, 'اضافة جوائز المدرسة', 0),
(283, 'awards_edit', 271, 0, 'تعديل جوائز المدرسة', 0),
(284, 'facilities', 271, 0, 'عرض مرافق المدرسة', 0),
(285, 'facilitie_add', 271, 0, 'اضافة مرافق المدرسة', 0),
(286, 'facilities_edit', 271, 0, 'تعديل مرافق المدرسة', 0),
(287, 'delete_awards', 271, 0, 'حذف جوائز المدرسة', 0),
(288, 'facilities_delete', 271, 0, 'حذف مرافق المدرسة', 0),
(289, 'teacher_add', 271, 0, 'اضافة المعلم', 0),
(290, 'teacher_edit', 271, 0, 'تعديل المعلم', 0),
(291, 'delete_teacher', 271, 0, 'حذف المعلم', 0),
(292, 'supervisor_add', 271, 0, 'اضافة مشرفين', 0),
(293, 'supervisor_edit', 271, 0, 'تعديل مشرفين', 0),
(294, 'delete_supervisor', 271, 0, 'حذف مشرفين', 0),
(295, 'general_supervision', 296, 0, 'الاشراف العام', 0),
(296, 'services', 0, 0, 'جميع الخدمات', 0),
(297, 'educational_supervision', 0, 0, 'الاشراف التربوي', 0),
(298, 'quality_excellence', 0, 0, 'التميز والجودة', 0),
(299, 'training_courses', 0, 0, 'الدورات التدريبية', 0),
(300, 'gifted_students', 0, 0, 'الطلاب الموهوبين', 0),
(301, 'school_equipment', 0, 0, 'التجهزات المدرسية', 0),
(302, 'management', 0, 0, 'الادارة والتشغل', 0),
(303, 'technology', 0, 0, 'التقنية', 0),
(304, 'activate_service', 296, 0, 'تفعيل الخدمة', 0),
(305, 'general_supervision_details', 296, 0, 'الدخول الى الخدمة', 0),
(306, 'reply_notes', 296, 0, 'الرد على المشرف', 0),
(307, 'finish_appointmant', 296, 0, 'انهاء الزيارة', 0),
(308, 'courses', 0, 0, 'الدورات التدريبية', 0),
(309, 'add', 308, 0, 'اضافة دورة', 0),
(310, 'courses', 308, 0, 'عرض الدورات التدريبية', 0),
(311, 'circulars', 0, 0, 'التعاميم', 0),
(312, 'list', 311, 0, 'جميع التعاميم', 0),
(313, 'add', 311, 0, 'انشاء تعميم جديد', 0),
(314, 'archives', 311, 0, 'تعاميم مؤرشفة', 0),
(315, 'complete', 311, 0, 'تعاميم مرسلة', 0),
(316, 'invoice', 0, 0, 'الفواتير', 0),
(317, 'receipt', 316, 0, 'الفاتورة', 0),
(318, 'reports', 0, 0, 'التقارير', 0),
(319, 'school', 318, 0, 'تقارير المدرسة', 0),
(320, 'services', 318, 0, 'تقارير الخدمات', 0),
(321, 'apps', 0, 0, 'التطبيقات', 0),
(322, 'school', 321, 0, 'تطبيق 1', 0),
(323, 'services', 321, 0, 'تطبيق 2', 0),
(324, 'educational_supervision', 297, 0, 'عرض خدمة الاشراف التربوي', 0),
(325, 'activate_service', 299, 0, 'تفعيل الخدمة', 0),
(326, 'view', 299, 0, 'الدخول الى الخدمة', 0),
(327, 'accept_trainee', 299, 0, 'قبول المتدربين', 0),
(328, 'unaccept_trainee', 299, 0, 'رفض المتدربيبن', 0),
(329, 'delete_trainee', 299, 0, 'حذف المتدرب', 0),
(330, 'activate_service', 297, 0, 'طلب الخدمة', 0),
(331, 'view', 297, 0, 'الدخول الى الخدمة', 0),
(332, 'view_school', 271, 0, 'عرض تفاصيل المدرسة', 0),
(333, 'technical', 277, 0, 'عرض ملف الطالب', 0),
(334, 'delete', 277, 0, 'حذف الطالب', 0),
(335, 'add', 277, 0, 'اضافة طالب موهوب', 0),
(336, 'student_scholastic_add', 277, 0, 'الوضع الدارسي', 0),
(337, 'delete_scholastic', 277, 0, 'حذف الوضع الدراسي', 0),
(338, 'excellence_aspect_add', 277, 0, 'جوانب التميز', 0),
(339, 'student_achievements_add', 277, 0, 'اضافة الانجازات والجوائز', 0),
(340, 'delete_student_achievements', 277, 0, 'حذف الانجازات والجوائز', 0),
(341, 'student_enrichment_add', 277, 0, 'اضافة البرامج الاثرائية', 0),
(342, 'student_enrichment_delete', 277, 0, 'حذف البرامج الاثرائية', 0),
(343, 'students_videos_add', 277, 0, 'اضافة مرئيات معلم الموهوبين', 0),
(344, 'delete_videos', 277, 0, 'حذف مرئيات معلم الموهوبين', 0),
(345, 'student_varibles_add', 277, 0, 'اضافة المتغيرات الذي تطرأ على الطالب', 0),
(346, 'student_varibles_delete', 277, 0, 'حذف المتغيرات الذي تطرأ على الطالب', 0),
(347, 'student_special_needs_add', 277, 0, 'اضافة الإحتياجات الخاصة للطالب', 0),
(349, 'procedures_implemented_add', 277, 0, 'اضافة الاجراءت المنفذة', 0),
(350, 'program_courses_add', 277, 0, 'اضافة البرنامج والدورات', 0),
(351, 'program_courses_delete', 277, 0, 'حذف البرنامج والدورات', 0),
(352, 'certificates_appreciation_add', 277, 0, 'اضافة شهادات التقدير', 0),
(353, 'certificates_appreciation_delete', 277, 0, 'حذف شهادات التقدير', 0),
(354, 'letters_thanks_add', 277, 0, 'اضافة شهادات الشكر', 0),
(355, 'letters_thanks_delete', 277, 0, 'حذف شهادات الشكر', 0),
(356, 'share_certificates_add', 277, 0, 'اضافة شهادات المشاركة', 0),
(357, 'share_certificates_delete', 277, 0, 'حذف شهادات المشاركة', 0),
(358, 'software_certificates_add', 277, 0, 'اضافة شهادات البرامج الاثرائية والتدريبية', 0),
(359, 'software_certificates_delete', 277, 0, 'حذف شهادات البرامج الاثرائية والتدريبية', 0),
(360, 'shields_add', 277, 0, 'اضافة الدروع', 0),
(361, 'shields_delete', 277, 0, 'حذف الدروع', 0),
(362, 'student_gallery_add', 277, 0, 'اضافة البوم الصور للطالب الموهوب', 0),
(363, 'gallery_delete', 277, 0, 'حذف الصور للطالب الموهوب', 0),
(364, 'reply_message', 296, 0, 'الرد على المشرف', 0),
(365, 'add_appointmant', 296, 0, 'حجز موعد', 0),
(366, 'prime_stage_add', 296, 0, 'الطور التمهيدي - القيادة المدرسية', 0),
(367, 'prime_stage_2_add', 296, 0, 'الطور التمهيدي -البئية المدرسية -البيئة العامة', 0),
(368, 'prime_stage_3_add', 296, 0, 'الطور التمهيدي -البئية المدرسية -البيئة الخاصة', 0),
(369, 'prime_stage_4_add', 296, 0, 'الطور التمهيدي -البئية المدرسية -البيئة الامنة', 0),
(370, 'prime_stage_5_add', 296, 0, 'التعليم والتعلم', 0),
(371, 'prime_stage_6_add', 296, 0, 'التطوير والتمنية المهنية', 0),
(372, 'get_students_gifted_by_id', 271, 0, 'تعديل الطلاب الموهوبين', 0),
(373, 'to_appointment', 299, 0, 'الذهاب الى حجز موعد', 0),
(374, 'to_open_service', 299, 0, 'الذهاب الى فتح الخدمة', 0),
(375, 'to_measure', 299, 0, 'الذهاب الى قياس الرضى', 0),
(376, 'course_details', 308, 0, 'تفاصيل الدورة التدريبية', 0),
(377, 'finish_courses', 299, 0, 'انهاء الدورة التدريبية', 0),
(378, 'add_message', 299, 0, 'ارسال الرسالة', 0),
(379, 'reply_message', 299, 0, 'الرد على المشرف', 0),
(380, 'get_video_appoint_by_id', 296, 0, 'عرض المرئيات', 0),
(381, 'add_message', 297, 0, 'ارسال الرسالة', 0),
(382, 'reply_message', 297, 0, 'الرد على المشرف', 0),
(383, 'activate_service', 301, 0, 'تفعيل الخدمة', 0),
(384, 'view', 301, 0, 'الدخول الى الخدمة', 0),
(385, 'add_message', 301, 0, 'مراسلة المشرف', 0),
(386, 'reply_message', 301, 0, 'الرد على المشرف', 0),
(387, 'reply_notes', 301, 0, 'الرد على المشرف في نموذج الخدمة', 0),
(388, 'reply_notes', 299, 0, 'الرد على المشرف في نموذج الخدمة', 0),
(389, 'reply_notes', 297, 0, 'الرد على المشرف في نموذج الخدمة', 0),
(390, 'add_product', 301, 0, 'طلب منتج', 0),
(391, 'accept_request', 296, 0, 'قبول الخدمة', 0),
(392, 'notification_view', 296, 0, 'مشاهدة الاشعار', 0),
(393, 'add_notes', 296, 0, 'اضافة ملاحظات', 0),
(394, 'add_table', 308, 0, 'اضافة جدول للدورة التدريبية', 0),
(395, 'finish_courses', 308, 0, 'انهاء الدورة التدريبية', 0),
(396, 'delete', 308, 0, 'حذف الدورة التدريبية', 0),
(397, 'get_list_trainee_by_id', 299, 0, 'جلب اسماء المرشحين', 0),
(398, 'delete_product_request', 301, 0, 'حذف طلب المنتج', 0),
(399, 'visit', 297, 0, 'الدخول لتفاصيل الزيارة الصفية', 0),
(400, 'visit_add', 297, 0, 'اضافة معلومات الزيارة', 0),
(401, 'visit_update', 297, 0, 'تحدبث معلومات الزيارة', 0),
(402, 'teacher_info_add', 297, 0, 'اضافة معلومات المعلم', 0),
(403, 'teacher_info_edit', 297, 0, 'تحدبث معلومات المعلم', 0),
(404, 'visitor_info_add', 297, 0, 'اضافة معلومات الزيارة', 0),
(405, 'visitor_info_edit', 297, 0, 'تعديل معلومات الزائر', 0),
(406, 'prime_info_add', 297, 0, 'اضافة معلومات اولية عن الزيارة', 0),
(407, 'prepara_lesson_add', 297, 0, 'اضافة الاعداد للدرس', 0),
(408, 'teacher_performance_add', 297, 0, 'اداء المعلم للدرس', 0),
(409, 'dealing_students_add', 297, 0, 'التعامل مع الطلاب', 0),
(410, 'strategic_teacher_add', 297, 0, 'اضافة الدور الاستراتيجي للمعلم', 0),
(411, 'evaluate_teacher_add', 297, 0, 'اضافة الدور القيمي للمعلم', 0),
(412, 'behavior_student_add', 297, 0, 'سلوك الطلاب في الدرس', 0),
(413, 'performance_teacher_add', 297, 0, 'ايجابية الطالب في التعلم', 0),
(414, 'provide_achievement_add', 297, 0, 'اضافة تقدم الطلاب في التعلم', 0),
(415, 'achievement_level_add', 297, 0, 'اضافة المستوى التحصيلي', 0),
(416, 'build_tests_add', 297, 0, 'اضافة بناء اختبارات واساليب التقويم ', 0),
(417, 'impact_assessment_add', 297, 0, 'اضافة اثر اساليب التقويم على الطلاب', 0),
(418, 'documenting_test_add', 297, 0, 'اضافة توثيق نتائج الاختبارات والتقويم', 0),
(419, 'role_leadership_add', 297, 0, 'اضافة دور القيادة مع المعلم', 0),
(420, 'leadership_student_add', 297, 0, 'اضافة دور القيادة مع الطالب', 0),
(421, 'send_request', 301, 0, 'ارسال الطلب', 0),
(422, 'approval_request', 301, 0, 'تأكيد الطلب', 0),
(423, 'visit_add', 297, 0, 'انشاء زيارة صفية', 0),
(424, 'get_teacher_info_by_id', 297, 0, 'جلب معلومات المعلم', 0),
(425, 'activate_service', 302, 0, 'تفعيل الخدمة', 0),
(426, 'accept_request', 302, 0, 'تفعيل الطلب', 0),
(427, 'reject_request', 302, 0, 'رفض الطلب', 0),
(428, 'view', 302, 0, 'تفاصيل الخدمة', 0),
(429, 'add_message', 302, 0, 'اضافة رسالة', 0),
(430, 'reply_message', 302, 0, 'الرد على المشرف', 0),
(431, 'add_notes', 302, 0, 'اضافة ملاحظات', 0),
(432, 'reply_notes', 302, 0, 'الرد على الملاحظات', 0),
(433, 'add_appointmant', 302, 0, 'حجز موعد', 0),
(434, 'add_vedio', 302, 0, 'مرئيات الزيارة', 0),
(435, 'finish_appointmant', 302, 0, 'انهاء الزيارة', 0),
(436, 'get_teatcher_name', 299, 0, 'جلب اسماء المعلمين والمشرفين', 0),
(437, 'get_supervisor_name', 299, 0, 'جلب اسماء المشرفين', 0),
(438, 'trainee_add', 299, 0, 'اضافة مرشح', 0),
(439, 'accept_request', 297, 0, 'تفعيل الخدمة', 0),
(440, 'add_notes', 297, 0, 'اضافة ملاحظات', 0),
(441, 'to_appointment', 297, 0, 'الانتقال الى حجز موعد', 0),
(442, 'add_appointmant', 297, 0, 'حجز موعد', 0),
(443, 'finish_appointmant', 297, 0, 'انهاء الزيارة', 0),
(444, 'to_open_service', 297, 0, 'الانتقال الى فتح الخدمة', 0),
(445, 'to_measure', 297, 0, 'الانتقال الى قياس الرضى', 0),
(446, 'add_vedio', 297, 0, 'اضافة مرئيات الزيارة', 0),
(447, 'end_visit', 297, 0, 'انهاء الزيارة الصفية', 0),
(448, 'end_service', 297, 0, 'انهاء الخدمة', 0),
(449, 'delete_service', 299, 0, 'حذف الخدمة', 0),
(450, 'accept_request', 299, 0, 'قبول الخدمة', 0),
(451, 'add_message', 299, 0, 'اضافة ملاحظات', 0),
(452, 'reply_message', 299, 0, 'الرد على المشرف', 0),
(453, 'add_appointmant', 299, 0, 'حجز موعد', 0),
(454, 'add_vedio', 299, 0, 'اضافة مرئيات زيارة', 0),
(455, 'finish_appointmant', 299, 0, 'انهاء الزيارة', 0),
(456, 'reject_request', 299, 0, 'رفض الطلب', 0),
(457, 'to_appointment', 299, 0, 'الانتقال الى حجز موعد', 0),
(458, 'to_open_service', 299, 0, 'الذهاب الى فتح الخدمة', 0),
(459, 'to_measure', 299, 0, 'الذهاب الى قياس الرضى', 0),
(460, 'get_video_appoint_by_id', 299, 0, 'جلب مرئيات الزيارة', 0),
(461, 'end_service', 299, 0, 'نهاية الخدمة', 0),
(463, 'add_notes', 299, 0, 'اضافة نموذج الخدمة', 0),
(464, 'reply_notes', 299, 0, 'الرد على الملاحظات', 0),
(465, 'finish_trainee', 299, 0, 'الانتهاء من الترشيح', 0),
(466, 'delete_service', 300, 0, 'حذف الخدمة', 0),
(467, 'activate_service', 300, 0, 'طلب الخدمة', 0),
(468, 'accept_request', 300, 0, 'قبول الطلب', 0),
(469, 'reject_request', 300, 0, 'رفض الطلب', 0),
(470, 'to_appointment', 300, 0, 'الانتقال الى حجز موعد', 0),
(471, 'to_open_service', 300, 0, 'الانتقال الى فتح الخدمة', 0),
(472, 'to_measure', 300, 0, 'الذهاب الى قياس الرضى', 0),
(473, 'add_notes', 300, 0, 'نموذج الخدمة', 0),
(474, 'reply_notes', 300, 0, 'الرد على المشرف', 0),
(475, 'add_appointmant', 300, 0, 'حجز موعد', 0),
(476, 'add_vedio', 300, 0, 'اضافة مرئيات الزيارة', 0),
(477, 'finish_appointmant', 300, 0, 'انهاء الزيارة', 0),
(478, 'end_service', 300, 0, 'انهاء الخدمة', 0),
(479, 'delete_service', 301, 0, 'حذف الخدمة', 0),
(480, 'accept_request', 301, 0, 'قبول الخدمة', 0),
(481, 'reject_request', 301, 0, 'رفض الخدمة', 0),
(482, 'add_notes', 301, 0, 'اضافة نموذج خدمة', 0),
(483, 'reply_notes', 301, 0, 'رد على نموذج الخدمة', 0),
(484, 'add_message', 301, 0, 'ارسال المرسلات ', 0),
(485, 'add_appointmant', 301, 0, 'حجو موعد', 0),
(486, 'add_vedio', 301, 0, 'اضافة مرئيات الزيارة', 0),
(487, 'finish_appointmant', 301, 0, 'انهاء الزيارة', 0),
(488, 'to_appointment', 301, 0, 'الذهاب الى حجز الزيارة', 0),
(489, 'to_open_service', 301, 0, 'الذهاب الى فتح الخدمة', 0),
(490, 'to_measure', 301, 0, 'الذهاب الى قياس الرضى', 0),
(491, 'add_product', 301, 0, 'اضافة منتج', 0),
(492, 'accept_product_request', 301, 0, 'قبول طلب المنتجات', 0),
(493, 'reject_product_request', 301, 0, 'رفض طلبت المنتجات', 0),
(494, 'delete_product_request', 301, 0, 'حذف الطلب', 0),
(495, 'send_request', 301, 0, 'ارسال الطلب', 0),
(496, 'approval_request', 301, 0, 'تأكيد الطلب', 0),
(497, 'final_accept', 301, 0, 'القبول النهائي', 0),
(498, 'end_service', 301, 0, 'انهاء الخدمة', 0),
(499, 'delete_service', 296, 0, 'حذف الخدمة', 0),
(500, 'add_message', 296, 0, 'اضافة مرسلة الخدمة', 0),
(501, 'add_vedio', 296, 0, 'اضافة مرئيات الزيارة', 0),
(502, 'reject_request', 296, 0, 'رفض الطلب', 0),
(503, 'to_appointment', 296, 0, 'الذهاب الى حجز الموعد', 0),
(504, 'to_open_service', 296, 0, 'الذهاب الى فتح الخدمة', 0),
(505, 'to_measure', 296, 0, 'الذهاب الى قياس الرضى', 0),
(506, 'end_service', 296, 0, 'انهاء الخدمة', 0),
(507, 'delete_service', 297, 0, 'حذف الطلب', 0),
(508, 'reject_request', 297, 0, 'رفض الطلب', 0),
(509, 'get_students_gifted_by_id', 271, 0, 'بيانات الطلاب الموهوبين', 0),
(510, 'excellence_aspect_add', 277, 0, 'اضافة جوانب التميز', 0),
(511, 'student_special_needs_add', 277, 0, 'الإحتياجات الخاصة للطالب', 0),
(512, 'procedures_implemented_add', 277, 0, 'الإجراءات المنفذة', 0),
(513, 'supervisor_edit', 271, 0, 'تعديل المشرفين', 0),
(514, 'educational_supervision_details', 297, 0, 'الدخول الى الخدمة', 0),
(515, 'add', 311, 0, 'اضافة تعميم', 0),
(516, 'edit', 311, 0, 'تعديل التعميم', 0),
(517, 'delete', 311, 0, 'حذف التعميم', 0),
(518, 'view', 311, 1, 'عرض التعميم', 0),
(519, 'add_response', 311, 0, 'اضافة رد', 0),
(520, 'add_message', 311, 0, 'اضافة رسالة', 0),
(521, 'reply_message', 311, 0, 'اضافة رد', 0),
(522, 'receiptsjh', 316, 0, 'سندات قبض', 0),
(523, 'add_invoice', 296, 0, 'اضافة فاتورة', 0),
(524, 'getInvoiceReport', 296, 0, 'طباعة الفاتورة', 0),
(525, 'receipt_add', 296, 0, 'اضافة سند قبض', 0),
(526, 'getReceiptReport', 296, 0, 'طباعة سند القبض', 0),
(527, 'delete_receipt', 296, 0, 'حذف سند القبض', 0),
(528, 'send_invoice', 296, 0, 'ارسال الفاتورة', 0),
(529, 'send_invoice', 299, 0, 'ارسال الفاتورة', 0),
(530, 'receipt_add', 299, 0, 'اضافة سند قبض', 0),
(531, 'delete_receipt', 299, 0, 'حذف سند القبض', 0),
(532, 'send_invoice', 297, 0, 'ارسال الفاتورة', 0),
(533, 'receipt_add', 297, 0, 'اضافة سند القبض', 0),
(534, 'delete_receipt', 297, 0, 'حذف سند القبض', 0),
(535, 'add_invoice', 297, 0, 'اضافة الفاتورة', 0),
(536, 'add_invoice', 300, 0, 'اضافة فاتورة', 0),
(537, 'delete_receipt', 300, 0, 'حذف سند القبض', 0),
(538, 'receipt_add', 300, 0, 'اضافة سند قبض', 0),
(539, 'send_invoice', 300, 0, 'ارسال الفاتورة', 0),
(540, 'add_invoice', 301, 0, 'اضافة فاتورة', 0),
(541, 'receipt_add', 301, 0, 'اضافة سند القبض', 0),
(542, 'delete_receipt', 301, 0, 'حذف سند القبض', 0),
(543, 'send_invoice', 301, 0, 'ارسال الفاتورة', 0),
(544, 'activate_service', 303, 0, 'تفعيل الخدمة', 0),
(545, 'view', 303, 0, 'الدخول الى الخدمة', 0),
(546, 'reply_notes', 303, 0, 'الرد على المشرف', 0),
(547, 'finish_appointmant', 303, 0, 'انهاء الزيارة', 0),
(548, 'to_appointment', 303, 0, 'الذهاب الى حجز الموعد', 0),
(549, 'to_open_service', 303, 0, 'الذهاب الى فتح الخدمة', 0),
(550, 'to_measure', 303, 0, 'الذهاب الى قياس الرضى', 0),
(551, 'add_message', 303, 0, 'اضافة رسالة', 0),
(552, 'reply_message', 303, 0, 'الرد على الرسالة', 0),
(553, 'get_video_appoint_by_id', 303, 0, 'عرض مرئيات الزيارة', 0),
(554, 'activate_service', 303, 0, 'تفعيل الخدمة', 0),
(555, 'reply_notes', 303, 0, 'الرد على المشرف', 0),
(556, 'notification_view', 303, 0, 'مشاهدة الاشعار', 0),
(557, 'add_notes', 303, 0, 'اضافة ملاحظات', 0),
(558, 'accept_request', 303, 0, 'تفعيل الطلب', 0),
(559, 'reject_request', 303, 0, 'رفض الطلب', 0),
(560, 'add_appointmant', 303, 0, 'حجز موعد', 0),
(561, 'add_request', 303, 0, 'اضافة طلب', 0),
(562, 'add_invoice', 303, 0, 'اضافة فاتورة', 0),
(563, 'delete_receipt', 303, 0, 'حذف سند القبض', 0),
(564, 'receipt_add', 303, 0, 'اضافة سند القبض', 0),
(565, 'send_invoice', 303, 0, 'ارسال الفاتورة', 0),
(566, 'cunt_notification', 296, 1, 'مشاهدة الاشعار', 0),
(567, 'notification_message_view', 296, 1, 'تمت مشاهدة الاشعار', 0),
(573, 'notification_message_view', 299, 1, 'مشاهدة الاشعار', 0),
(574, 'cunt_notification', 299, 1, 'عدد الاشعارات', 0),
(575, 'notification_message_view', 301, 1, 'مشاهدة الاشعار', 0),
(576, 'cunt_notification', 301, 1, 'عدد الاشعارات', 0),
(577, 'notification_message_view', 303, 1, 'مشاهدة الاشعار', 0),
(578, 'cunt_notification', 303, 1, 'عدد الاشعارات', 0),
(579, 'get_products_by_category', 301, 0, 'فلترة المنتجات', 0),
(580, 'chats', 0, 0, 'المحادثات', 0),
(581, 'reply_message', 580, 0, 'ارسال شات', 0),
(582, 'get_messages_by_id', 580, 0, 'استراجع نص المحادثة', 0),
(583, 'get_user_name', 580, 0, 'جلب اسم المستخدم', 0),
(584, 'cunt_notification', 580, 1, 'الاشعارات الخاصة بالشات', 0),
(585, 'add_supervisor', 297, 0, 'تعين مشرف', 0),
(586, 'getAllReport', 297, 0, 'طباعة تقرير الزيارة', 0),
(587, 'import_teacher', 271, 0, 'استيراد المعلمين', 0),
(588, 'import_supervisor', 271, 0, 'استيراد المشرفين', 0),
(589, 'end_service', 299, 0, 'انهاء الخدمة', 0),
(590, 'end_service', 303, 0, 'انهاء الخدمة', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `name`, `description`) VALUES
(1, 'ادمن ', 'جميع الصلاحيات متاحة'),
(8, 'المشرف', ''),
(9, 'محاسب', 'الأمور المالية'),
(10, 'مدير المدرسة', ''),
(11, 'المدير العام', ''),
(12, 'مالك المدرسة', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `admin_id` int(11) NOT NULL,
  `admin_guid` varchar(500) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_phone` varchar(200) NOT NULL,
  `admin_img` text NOT NULL,
  `admin_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_role` int(11) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`admin_id`, `admin_guid`, `admin_name`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `admin_img`, `admin_created_on`, `admin_role`, `admin_status`) VALUES
(1, 'CZf7aA45', 'أدمن 1', 'user1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'a@gmail.com', '0', '', '2017-01-28 09:41:14', 1, 1),
(43, 'AVxU4AqN', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'g@gmail.com', '', '', '2018-12-12 02:54:28', 2, 0),
(44, 'OrJlJj1M', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1@gmail.com', '', '', '2018-12-12 02:55:47', 3, 0),
(50, 'DUoEWNex', '', '', 'bb2f40ab64e90f8b841daf9b0eb6c7089755a85b', 'ahmed.5qumsan@gmail.com', '', '', '2018-12-12 03:18:36', 3, 0),
(51, '3wjF07KS', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '3@gmail.com', '', '', '2018-12-13 14:01:19', 3, 0),
(52, 'LHcc2STj', '', '', '30c7256143905f6ddf758ddb66d89b09bb00829c', 'ahmed.qumsan@gmail.com', '', '', '2018-12-13 14:03:50', 3, 0),
(53, '6wn0klVp', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '5@gmail.com', '', '', '2018-12-13 14:19:07', 3, 0),
(54, 'nyNNViZa', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '6@gmail.com', '', '', '2018-12-13 15:21:17', 3, 0),
(55, 'cxUgzAzm', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '7@gmail.com', '', '', '2018-12-16 13:20:30', 3, 0),
(56, 'aUVINbj7', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '8@gmail.com', '', '', '2018-12-16 13:21:09', 3, 0),
(57, '2Pyh8mRE', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '10@gmail.com', '', '', '2018-12-17 06:09:24', 3, 0),
(58, '2hUJhU8x', '', '', 'a71578d8e036a959c89f67c20cb0e30ce70bad1e', 'abulez114@yahoo.com', '', '', '2018-12-17 15:20:50', 3, 0),
(59, 'eG5SfaNI', '', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'agent1@yahoo.com', '', '', '2018-12-17 15:26:04', 2, 0),
(60, 'kfGg5fBS', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'a1@gmail.com', '', '', '2018-12-19 23:54:56', 4, 0),
(61, '7MHb22Mr', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'agent1@gmail.com', '', '', '2018-12-20 16:46:41', 2, 0),
(62, '3YVmmyXc', '', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '20@gmail.com', '', '', '2018-12-25 22:59:36', 3, 0),
(63, 'Pb9SfXva', '', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ahmed.qumsan0@gmail.com', '', '', '2018-12-29 04:24:01', 2, 0),
(64, 'uFIRBZ86', '', '', 'e2f60562441f1b9f0b9ce22f8082eac911ed8479', '', '', '', '2018-12-29 04:30:15', 3, 0),
(65, 'AV9hcLOZ', '', '', 'b2ee60370ad57d9bc3877e9024c507ab99303a64', 'ezz.agent@test.com', '', '', '2019-01-05 22:04:22', 2, 0),
(66, 'nfc53Ak2', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ez@test.biz', '', '', '2019-01-10 15:39:26', 3, 0),
(67, 'AfjVtKLg', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 's1@test.com', '', '', '2019-01-10 15:40:43', 3, 0),
(68, '2Xot2rKt', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ag1@test.com', '', '', '2019-01-11 00:06:40', 2, 0),
(71, 'eWMxBM5x', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '44@gmail.com', '', '', '2019-01-14 07:29:58', 3, 0),
(74, 'V0mswFGw', '', '', '', NULL, '', '', '2019-01-14 08:21:47', 3, 0),
(75, 'O8Pn479M', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ag2@test.com', '', '', '2019-01-20 17:27:38', 2, 0),
(76, 'RyCUJZdX', '', '', '', NULL, '', '', '2019-01-20 17:29:13', 3, 0),
(77, 'SDAJezat', '', '', '', NULL, '', '', '2019-01-20 17:32:44', 3, 0),
(78, '8zxDkTSw', '', '', '', NULL, '', '', '2019-01-20 17:36:43', 3, 0),
(79, 'm4BJLO6v', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'stu5@test.ccom', '', '', '2019-01-21 04:01:11', 3, 0),
(80, '1CuewMl1', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'stu6@test.com', '', '', '2019-01-21 16:00:58', 3, 0),
(81, 'QeUHtUQn', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'stu7@test.com', '', '', '2019-01-31 03:30:14', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `agents_tb`
--

CREATE TABLE `agents_tb` (
  `agents_id` int(5) NOT NULL,
  `agents_user_id` varchar(500) NOT NULL,
  `agents_apply_for` varchar(50) NOT NULL,
  `agents_company_name` varchar(500) NOT NULL,
  `agents_type_business` varchar(500) NOT NULL,
  `agents_position` varchar(500) NOT NULL,
  `agents_person_charge` varchar(500) NOT NULL,
  `agents_person_charge_contact_number` varchar(500) NOT NULL,
  `agents_swift` varchar(500) NOT NULL,
  `agents_fullname` varchar(500) NOT NULL,
  `agents_country` varchar(500) NOT NULL,
  `agents_address` varchar(500) NOT NULL,
  `agents_phone` varchar(500) NOT NULL,
  `agents_account_no` varchar(500) NOT NULL,
  `agents_paypal` varchar(500) NOT NULL,
  `agents_account_name` varchar(500) NOT NULL,
  `agents_bank_name` varchar(500) NOT NULL,
  `agents_bank_address` varchar(500) NOT NULL,
  `agents_status_coupon` int(5) NOT NULL,
  `agents_created_on` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agents_tb`
--

INSERT INTO `agents_tb` (`agents_id`, `agents_user_id`, `agents_apply_for`, `agents_company_name`, `agents_type_business`, `agents_position`, `agents_person_charge`, `agents_person_charge_contact_number`, `agents_swift`, `agents_fullname`, `agents_country`, `agents_address`, `agents_phone`, `agents_account_no`, `agents_paypal`, `agents_account_name`, `agents_bank_name`, `agents_bank_address`, `agents_status_coupon`, `agents_created_on`) VALUES
(2, 'Pb9SfXva', '1', 'Inet', 'It solution', 'manager', '20', '254', '032465455', '', '', 'malaysia', '0066523123025', '2636485515', '---', 'mohammed', 'saudi arabia bank', '0', 0, '2018-12-28 22:26:21'),
(3, '2Xot2rKt', '1', 'asl SDN BHD', 'Education ', 'E manager', 'Moh', '563522', 'lsdfk32q', '', '71', 'add', '5464', '3654654', 'empay@gmail.com', '13212', 'name ', 'address ban', 0, '2019-01-10 23:37:42'),
(4, 'AVxU4AqN', '2', '', '', '', '', '', '', 'Agent', '129', 'gaza', '055555', '0555', 'as@as.sd', '', '', '', 0, '2019-01-14 02:44:25'),
(5, 'O8Pn479M', '2', '', '', '', '', '', 'sdfee663', 'Agent 2', '198', 'addres', '215465', '23565', 'emsloo2@gmail.com', 'Bank Account', 'HDLL Bank', 'bank address', 0, '2019-01-20 12:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `apply_tb`
--

CREATE TABLE `apply_tb` (
  `apply_id` int(5) NOT NULL,
  `apply_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply_tb`
--

INSERT INTO `apply_tb` (`apply_id`, `apply_name`) VALUES
(1, 'University'),
(2, 'Language Ceter'),
(3, 'International School'),
(4, 'Other (if selected)');

-- --------------------------------------------------------

--
-- Table structure for table `attachs_tb`
--

CREATE TABLE `attachs_tb` (
  `attachs_id` int(5) NOT NULL,
  `attachs_title` varchar(500) NOT NULL,
  `attachs_file` varchar(500) NOT NULL,
  `attachs_user_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attachs_tb`
--

INSERT INTO `attachs_tb` (`attachs_id`, `attachs_title`, `attachs_file`, `attachs_user_id`) VALUES
(1, 'ييبيب', '__55(2)(1)(1).pdf', 'CZf7aALR'),
(2, 'my upload', 'aa.html', 'nyNNViZa'),
(3, 'pic', 'albarq.txt', 'nyNNViZa');

-- --------------------------------------------------------

--
-- Table structure for table `city_tb`
--

CREATE TABLE `city_tb` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_name_en` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city_tb`
--

INSERT INTO `city_tb` (`city_id`, `city_name`, `city_name_en`) VALUES
(1, 'مكة المكرمة', 'Makkah'),
(2, 'المدينة المنورة', 'Madina');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators_tb`
--

CREATE TABLE `coordinators_tb` (
  `coordinators_id` int(5) NOT NULL,
  `coordinators_name` varchar(500) NOT NULL,
  `coordinators_university` varchar(500) NOT NULL,
  `coordinators_phone` varchar(500) NOT NULL,
  `coordinators_email` varchar(500) NOT NULL,
  `coordinators_img` varchar(500) NOT NULL,
  `coordinators_created_on` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coordinators_tb`
--

INSERT INTO `coordinators_tb` (`coordinators_id`, `coordinators_name`, `coordinators_university`, `coordinators_phone`, `coordinators_email`, `coordinators_img`, `coordinators_created_on`) VALUES
(2, 'mohammed', '3', '011115644', 'asas@sd.sd', 'personal_pic.jpg', '2018-12-03 22:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `country_tb`
--

CREATE TABLE `country_tb` (
  `country_id` int(5) NOT NULL,
  `country_name_ar` varchar(500) NOT NULL,
  `country_name_en` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_tb`
--

INSERT INTO `country_tb` (`country_id`, `country_name_ar`, `country_name_en`) VALUES
(1, 'أبخازيا', 'Abkhazia'),
(2, 'إثيوبيا ', 'Ethiopia\n'),
(3, 'أذربيجان', 'Azerbaijan'),
(4, 'الارجنتين', 'Argentina'),
(5, 'الأردن', 'Jordan'),
(7, 'أرمينيا', 'Armenia'),
(8, ' إريتريا ', 'Eritrea\n'),
(9, 'إسبانيا', 'Spain'),
(10, 'أستراليا ', 'Australia'),
(11, 'إستونيا ', 'Estonia'),
(12, 'جمهورية أفريقيا الوسطى', 'Central African Republic'),
(13, 'أفغانستان', 'Afghanistan'),
(14, 'الإكوادور', 'Ecuador'),
(15, 'ألبانيا', 'Albania\n'),
(16, 'ألمانيا ', 'Germany'),
(17, 'الإمارات العربية المتحدة', 'The United Arab Emirates'),
(20, ' إندونيسيا', 'Indonesia'),
(21, 'أنغولا', 'Angola'),
(22, 'الأوروغواي', 'Uruguay'),
(23, 'أوزبكستان', 'Uzbekistan'),
(24, 'أوسيتيا الجنوبية', 'South Ossetia\n'),
(25, ' أوغندا', 'Uganda'),
(26, 'أوكرانيا', 'Ukraine'),
(27, 'إيران', 'Iran'),
(28, 'إيطاليا', 'Italy'),
(29, 'أيرلندا	', 'Ireland'),
(30, ' البرتغال', 'Portugal'),
(31, ' البرازيل', 'Brazil'),
(32, 'البحرين', 'Bahrain'),
(33, 'باراغواي', 'Paraguay'),
(34, ' بالاو', 'Palau'),
(35, '  باكستان', 'Pakistan'),
(37, ' بروناي', 'Brunei'),
(39, 'بلجيكا', 'Belgium'),
(40, 'بلغاريا', 'Bulgaria'),
(42, 'بنغلاديش', 'Bangladesh'),
(43, 'بنما', 'Panama'),
(51, 'بولندا', 'Poland\n'),
(52, 'بوليفيا', 'Bolivia'),
(53, 'بيرو', 'Peru'),
(54, 'تايلاند', 'Thailand'),
(55, 'جمهورية الصين', 'Republic of China\n'),
(57, ' تركمانستان', 'Turkmenistan'),
(58, 'تركيا', 'Turkey'),
(59, 'ترينيداد وتوباغو', 'Trinidad and Tobago\n'),
(60, 'تشاد', 'Chad'),
(61, 'جمهورية التشيك', 'Czech Republic'),
(62, ' تشيلي', 'Chile'),
(63, ' تنزانيا', 'Tanzania'),
(64, 'توغو', 'Togo'),
(67, 'تونس', 'Tunisia'),
(69, 'جامايكا', 'Jamaica'),
(71, ' الجزائر', 'Algeria'),
(72, 'جنوب أفريقيا', 'South Africa'),
(73, 'جنوب السودان', 'South Sudan\n'),
(74, 'جورجيا', 'Georgia'),
(75, 'جيبوتي', 'Djibouti\n'),
(76, ' الدنمارك', 'Denmark'),
(77, 'دومينيكا', 'Dominica'),
(78, 'جمهورية الدومينيكان', 'Dominican Republic\n'),
(80, 'رواندا', 'Rwanda'),
(81, 'روسيا', 'Russia'),
(83, 'رومانيا', 'Romania'),
(84, 'زامبيا', 'Zambia'),
(85, 'زيمبابوي', 'Zimbabwe'),
(93, 'سريلانكا', 'Sri Lanka'),
(94, 'السعودية', 'Saudi'),
(95, 'السلفادور', 'El Salvador\n'),
(96, 'سلوفاكيا', 'Slovakia'),
(99, ' السنغال', 'Senegal\n'),
(101, 'السودان', 'Sudan'),
(102, 'سوريا', 'Syria'),
(104, 'السويد', 'Sweden'),
(105, 'سويسرا', 'Switzerland'),
(110, 'صربيا', 'Serbia\n'),
(111, 'الصومال – جمهورية الصومال الديموقراطية', 'Somalia - Democratic Republic of Somalia\n'),
(112, 'الصين', 'China'),
(113, 'طاجيكستان', 'Tajikistan'),
(114, 'العراق', 'Iraq'),
(115, 'عمان', 'Oman'),
(116, 'الغابون', 'Gabon'),
(120, 'غواتيمالا', 'Guatemala'),
(122, 'غينيا', 'Guinea'),
(127, 'فرنسا', 'France\n'),
(128, 'الفلبين', 'Philippines'),
(129, 'فلسطين', 'Palestine'),
(130, 'فنزويلا', 'Venezuela'),
(131, 'فنلندا', 'Finland'),
(132, 'فيتنام', 'Vietnam'),
(133, 'فيجي', 'Fiji'),
(134, 'قبرص', 'Cyprus'),
(136, ' قيرغيزستان', 'Kyrgyzstan\n'),
(137, 'قطر', 'Qatar'),
(138, 'جزر القمر', 'Island of the Moon\n'),
(139, 'كازاخستان', 'Kazakhstan'),
(140, 'الكاميرون', 'Cameroon'),
(141, 'كرواتيا', 'Croatia'),
(142, 'كمبوديا', 'Cambodia'),
(143, ' كندا', 'Canada'),
(144, 'كوبا – جمهورية كوبا', 'Cuba - Republic of Cuba\n'),
(145, 'كوريا الجنوبية – جمهورية كوريا', 'South Korea - Republic of Korea\n'),
(146, 'كوريا الشمالية – جمهورية كوريا الديمقراطية الشعبية', 'North Korea - Democratic People\'s Republic of Korea\n'),
(147, 'كوستاريكا', 'Costa Rica\n'),
(148, 'كوسوفو – جمهورية كوسوفو', 'Kosovo - Republic of Kosovo\n'),
(149, 'كولومبيا', 'Colombia'),
(150, ' الكونغو', 'Congo'),
(152, 'الكويت', 'Kuwait'),
(154, 'كينيا', 'Kenya'),
(156, 'لاوس', 'Laos'),
(157, 'لبنان', 'Lebanon'),
(158, 'لوكسمبورغ', 'Luxembourg\n'),
(159, 'ليبيا', 'Libya'),
(160, 'ليبيريا', 'Liberia'),
(161, ' ليتوانيا', 'Lithuania'),
(165, 'المالديف', 'Maldives'),
(166, 'مالطا', 'Malta'),
(167, 'مالي', 'State of Mali\n'),
(168, 'ماليزيا', 'Malaysia'),
(169, 'المجر', 'Hungary'),
(170, 'مدغشقر', 'Madagascar'),
(171, 'مصر', 'Egypt'),
(172, ' المغرب', 'Morocco'),
(173, 'مقدونيا', 'Macedonia'),
(174, 'المكسيك', 'Mexico'),
(176, 'المملكة المتحدة', 'United kingdom\n'),
(178, 'موريتانيا', 'Mauritania'),
(180, 'موزمبيق', 'Mozambique'),
(186, 'النرويج', 'Norway'),
(187, ' النمسا – جمهورية النمسا', 'Austria - Republic of Austria\n'),
(188, 'نيبال', 'Nepal'),
(189, 'النيجر', 'Niger'),
(190, 'نيجيريا', 'Nigeria'),
(191, 'نيكاراغوا', 'Nicaragua'),
(192, 'نيوزيلندا', 'New Zealand\n'),
(193, 'هايتي', 'Haiti'),
(194, 'الهند', 'India'),
(195, 'هندوراس', 'Honduras'),
(196, 'هولندا', 'Netherlands'),
(197, 'اليابان', 'Japan'),
(198, 'اليمن', 'Yemen'),
(199, ' اليونان', 'Greece');

-- --------------------------------------------------------

--
-- Table structure for table `coupons_tb`
--

CREATE TABLE `coupons_tb` (
  `coupons_id` int(5) NOT NULL,
  `coupons_code` varchar(50) NOT NULL,
  `coupons_agent_id` varchar(50) NOT NULL,
  `coupons_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons_tb`
--

INSERT INTO `coupons_tb` (`coupons_id`, `coupons_code`, `coupons_agent_id`, `coupons_status`) VALUES
(8, 'Pb9SfXva', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `degree_tb`
--

CREATE TABLE `degree_tb` (
  `degree_id` int(5) NOT NULL,
  `degree_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `degree_tb`
--

INSERT INTO `degree_tb` (`degree_id`, `degree_name`) VALUES
(1, 'Foundation'),
(2, 'Diploma (Professional)'),
(3, 'Bachelor'),
(4, 'Master'),
(5, 'PHD');

-- --------------------------------------------------------

--
-- Table structure for table `gender_tb`
--

CREATE TABLE `gender_tb` (
  `gender_id` int(5) NOT NULL,
  `gender_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender_tb`
--

INSERT INTO `gender_tb` (`gender_id`, `gender_name`) VALUES
(1, 'بنين'),
(2, 'بنات');

-- --------------------------------------------------------

--
-- Table structure for table `institution_tb`
--

CREATE TABLE `institution_tb` (
  `institution_id` int(5) NOT NULL,
  `institution_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institution_tb`
--

INSERT INTO `institution_tb` (`institution_id`, `institution_name`) VALUES
(1, 'Public'),
(2, 'Private'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `flag` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `flag`, `file`) VALUES
(1, 'french', 'french-flag4.jpeg', 'admin_lang.php');

-- --------------------------------------------------------

--
-- Table structure for table `language_center_tb`
--

CREATE TABLE `language_center_tb` (
  `language_center_id` int(5) NOT NULL,
  `language_center_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language_center_tb`
--

INSERT INTO `language_center_tb` (`language_center_id`, `language_center_name`) VALUES
(2, 'KullMalbor'),
(3, 'KAGC');

-- --------------------------------------------------------

--
-- Table structure for table `messages_tb`
--

CREATE TABLE `messages_tb` (
  `messages_id` int(5) NOT NULL,
  `messages_guid` varchar(500) NOT NULL,
  `messages_title` varchar(500) NOT NULL,
  `messages_text` text NOT NULL,
  `messages_from` varchar(500) NOT NULL,
  `messages_to` varchar(500) NOT NULL,
  `messages_attach` varchar(500) NOT NULL,
  `messages_from_view` int(5) NOT NULL,
  `messages_to_view` int(5) NOT NULL,
  `message_created_on` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages_tb`
--

INSERT INTO `messages_tb` (`messages_id`, `messages_guid`, `messages_title`, `messages_text`, `messages_from`, `messages_to`, `messages_attach`, `messages_from_view`, `messages_to_view`, `message_created_on`) VALUES
(42, 'BlhNct', 'form majed ', 'form majed form majed form majed form majed form majed form majed form majed form majed form majed \nform majed form majed form majed form majed form majed form majed form majed form majed form majed form majed form majed form majed \n\n\n\nform majed form majed form majed form majed ', 'eWMxBM5x', 'CZf7aA45', '', 0, 0, '2019-01-13 23:38:17'),
(43, 'BlhNct', 'form majed ', 'form majed form majed form majed form majed form majed form majed form majed form majed form majed \nform majed form majed form majed form majed form majed form majed form majed form majed form majed form majed form majed form majed \n\n\n\nform majed form majed form majed form majed ', 'eWMxBM5x', 'kfGg5fBS', '', 0, 1, '2019-01-13 23:38:17'),
(44, 'GWUs87', 'from agents ', 'from agents from agents from agents from agents from agents from agents from agents from agents ', 'AVxU4AqN', 'CZf7aA45', '', 0, 0, '2019-01-13 23:55:55'),
(45, 'GWUs87', 'from agents ', 'from agents from agents from agents from agents from agents from agents from agents from agents ', 'AVxU4AqN', 'kfGg5fBS', '', 0, 1, '2019-01-13 23:55:55'),
(46, 'EaqiLT', 'سلام', 'سلام يا باشا \nشوف بقية الوثائق \nاليوم', 'kfGg5fBS', 'O8Pn479M', '', 1, 1, '2019-01-20 10:14:39'),
(47, 'CyEdEh', 'المرفقات الاضافية', 'رسل بالبقية \n', 'kfGg5fBS', 'O8Pn479M', '', 1, 1, '2019-01-20 19:18:05'),
(48, 'N5Bmla', 'ما الاخبار', 'سلام يا باشا\nما في اي جديد عن الطلب', '1CuewMl1', 'CZf7aA45', '', 0, 1, '2019-01-21 07:41:26'),
(49, 'N5Bmla', 'ما الاخبار', 'سلام يا باشا\nما في اي جديد عن الطلب', '1CuewMl1', 'kfGg5fBS', '', 0, 1, '2019-01-21 07:41:26'),
(52, 'G95Plh', 'from admin ', 'from admin from admin from admin from admin from admin ', 'CZf7aA45', 'eWMxBM5x', '', 1, 1, '2019-01-25 14:52:03'),
(53, 'XiqbrZ', 'from student ahmed ', 'from student ahmed from student ahmed from student ahmed from student ahmed from student ahmed ', 'LHcc2STj', 'CZf7aA45', '', 0, 1, '2019-01-25 21:15:39'),
(54, 'XiqbrZ', 'from student ahmed ', 'from student ahmed from student ahmed from student ahmed from student ahmed from student ahmed ', 'LHcc2STj', 'kfGg5fBS', '', 0, 0, '2019-01-25 21:15:39'),
(55, 'JRGmK0', 'احسنت', 'يا باشا \nطلبك اندر بروسسنح', 'CZf7aA45', '', '', 0, 0, '2019-01-30 19:05:25'),
(56, 'oVbEEi', 'احسنت', 'تحت المعالجة', 'CZf7aA45', 'QeUHtUQn', 'e1fbadf2a4665d7b7078f130d71469f9.png', 0, 1, '2019-01-30 19:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `mode_study`
--

CREATE TABLE `mode_study` (
  `mode_study_id` int(5) NOT NULL,
  `mode_study_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mode_study`
--

INSERT INTO `mode_study` (`mode_study_id`, `mode_study_name`) VALUES
(1, 'Research'),
(2, 'Mix mode'),
(3, 'Courses');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_tb`
--

CREATE TABLE `notifications_tb` (
  `notifications_id` int(5) NOT NULL,
  `notifications_from_id` varchar(500) NOT NULL,
  `notifications_to_id` varchar(500) NOT NULL,
  `notifications_type` varchar(500) NOT NULL,
  `notifications_app_id` varchar(500) NOT NULL,
  `notifications_is_view` int(5) NOT NULL,
  `notifications_created_on` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications_tb`
--

INSERT INTO `notifications_tb` (`notifications_id`, `notifications_from_id`, `notifications_to_id`, `notifications_type`, `notifications_app_id`, `notifications_is_view`, `notifications_created_on`) VALUES
(35, 'CZf7aA45', 'CZf7aA45', '7', '8FCVv5', 0, '2018-12-16 13:10:31'),
(36, 'CZf7aA45', 'CZf7aA45', '10', '8FCVv5', 1, '2018-12-16 14:04:37'),
(37, 'CZf7aA45', 'aUVINbj7', '10', '8FCVv5', 1, '2018-12-16 14:04:37'),
(38, 'AVxU4AqN', 'CZf7aA45', '2', 'ezhPiO', 0, '2018-12-17 00:09:24'),
(39, 'AVxU4AqN', 'CZf7aA45', '2', 'tcYoDv', 0, '2018-12-25 16:59:36'),
(40, 'AVxU4AqN', 'kfGg5fBS', '2', 'tcYoDv', 0, '2018-12-25 16:59:36'),
(41, 'Pb9SfXva', 'CZf7aA45', '2', '3vx39A', 0, '2018-12-28 22:30:15'),
(42, 'Pb9SfXva', 'kfGg5fBS', '2', '3vx39A', 0, '2018-12-28 22:30:15'),
(43, 'AVxU4AqN', 'CZf7aA45', '2', 'llUTY7', 0, '2019-01-14 02:21:47'),
(44, 'AVxU4AqN', 'kfGg5fBS', '2', 'llUTY7', 0, '2019-01-14 02:21:47'),
(45, 'O8Pn479M', 'CZf7aA45', '2', 'xBaAWW', 0, '2019-01-20 11:29:13'),
(46, 'O8Pn479M', 'kfGg5fBS', '2', 'xBaAWW', 0, '2019-01-20 11:29:13'),
(47, 'O8Pn479M', 'CZf7aA45', '2', 'nbyZ4p', 0, '2019-01-20 11:32:44'),
(48, 'O8Pn479M', 'kfGg5fBS', '2', 'nbyZ4p', 0, '2019-01-20 11:32:44'),
(49, 'O8Pn479M', 'CZf7aA45', '2', 'fBtRcH', 1, '2019-01-20 11:36:43'),
(50, 'O8Pn479M', 'kfGg5fBS', '2', 'fBtRcH', 0, '2019-01-20 11:36:43'),
(51, 'O8Pn479M', 'CZf7aA45', '1', ' xBaAWW', 0, '2019-01-21 09:03:31'),
(52, 'O8Pn479M', 'kfGg5fBS', '1', ' xBaAWW', 0, '2019-01-21 09:03:31'),
(53, 'O8Pn479M', 'CZf7aA45', '1', ' nbyZ4p', 0, '2019-01-21 15:08:52'),
(54, 'O8Pn479M', 'kfGg5fBS', '1', ' nbyZ4p', 0, '2019-01-21 15:08:52'),
(55, 'O8Pn479M', 'CZf7aA45', '1', ' vAotkY', 0, '2019-01-30 19:15:03'),
(56, 'O8Pn479M', 'kfGg5fBS', '1', ' vAotkY', 0, '2019-01-30 19:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `receipts_tb`
--

CREATE TABLE `receipts_tb` (
  `receipts_id` int(5) NOT NULL,
  `receipts_university` varchar(500) NOT NULL,
  `receipts_std_id` varchar(500) NOT NULL,
  `receipts_fund_status` varchar(500) NOT NULL,
  `receipts_fund` varchar(500) NOT NULL,
  `receipts_date` varchar(500) NOT NULL,
  `receipts_img` varchar(500) NOT NULL,
  `receipts_created_on` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipts_tb`
--

INSERT INTO `receipts_tb` (`receipts_id`, `receipts_university`, `receipts_std_id`, `receipts_fund_status`, `receipts_fund`, `receipts_date`, `receipts_img`, `receipts_created_on`) VALUES
(3, 'Islamic University', '15', '1', '2000', '2026-12-20', 'sss.jpg', '2018-12-03 21:30:00'),
(4, '1', '13', '2', '120', '2019-01-03', 'Capture.JPG', '2019-01-30 18:55:41'),
(5, '1', '34', '1', '4500', '2019-01-29', 'about-us-banner.png', '2019-01-30 19:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `rel_role_action`
--

CREATE TABLE `rel_role_action` (
  `id` int(9) UNSIGNED NOT NULL,
  `role_id` int(9) UNSIGNED NOT NULL,
  `action_id` int(9) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rel_role_action`
--

INSERT INTO `rel_role_action` (`id`, `role_id`, `action_id`) VALUES
(1, 10, 1),
(2, 10, 14),
(3, 10, 15),
(4, 10, 111),
(5, 10, 271),
(6, 10, 272),
(7, 10, 273),
(8, 10, 274),
(9, 10, 275),
(10, 10, 276),
(11, 10, 279),
(12, 10, 280),
(13, 10, 281),
(14, 10, 282),
(15, 10, 283),
(16, 10, 284),
(17, 10, 285),
(18, 10, 286),
(19, 10, 287),
(20, 10, 288),
(21, 10, 289),
(22, 10, 290),
(23, 10, 291),
(24, 10, 292),
(25, 10, 293),
(26, 10, 294),
(27, 10, 332),
(28, 10, 372),
(29, 10, 509),
(30, 10, 513),
(31, 10, 277),
(32, 10, 278),
(33, 10, 333),
(34, 10, 334),
(35, 10, 335),
(36, 10, 336),
(37, 10, 337),
(38, 10, 338),
(39, 10, 339),
(40, 10, 340),
(41, 10, 341),
(42, 10, 342),
(43, 10, 343),
(44, 10, 344),
(45, 10, 345),
(46, 10, 346),
(47, 10, 347),
(48, 10, 349),
(49, 10, 350),
(50, 10, 351),
(51, 10, 352),
(52, 10, 353),
(53, 10, 354),
(54, 10, 355),
(55, 10, 356),
(56, 10, 357),
(57, 10, 358),
(58, 10, 359),
(59, 10, 360),
(60, 10, 361),
(61, 10, 362),
(62, 10, 363),
(63, 10, 510),
(64, 10, 511),
(65, 10, 512),
(66, 10, 296),
(67, 10, 295),
(68, 10, 304),
(69, 10, 305),
(70, 10, 306),
(71, 10, 364),
(72, 10, 366),
(73, 10, 367),
(74, 10, 368),
(75, 10, 369),
(76, 10, 370),
(77, 10, 371),
(78, 10, 380),
(79, 10, 391),
(80, 10, 392),
(81, 10, 500),
(82, 10, 524),
(83, 10, 526),
(84, 10, 297),
(85, 10, 324),
(86, 10, 330),
(87, 10, 331),
(88, 10, 381),
(89, 10, 382),
(90, 10, 389),
(91, 10, 399),
(92, 10, 400),
(93, 10, 401),
(94, 10, 402),
(95, 10, 403),
(96, 10, 404),
(97, 10, 405),
(98, 10, 406),
(99, 10, 407),
(100, 10, 408),
(101, 10, 409),
(102, 10, 410),
(103, 10, 411),
(104, 10, 412),
(105, 10, 413),
(106, 10, 414),
(107, 10, 415),
(108, 10, 416),
(109, 10, 417),
(110, 10, 418),
(111, 10, 419),
(112, 10, 420),
(113, 10, 423),
(114, 10, 424),
(115, 10, 440),
(116, 10, 514),
(117, 10, 586),
(118, 10, 298),
(119, 10, 299),
(120, 10, 325),
(121, 10, 326),
(122, 10, 327),
(123, 10, 328),
(124, 10, 329),
(125, 10, 377),
(126, 10, 378),
(127, 10, 379),
(128, 10, 388),
(129, 10, 397),
(130, 10, 436),
(131, 10, 437),
(132, 10, 438),
(133, 10, 452),
(134, 10, 464),
(135, 10, 300),
(136, 10, 473),
(137, 10, 474),
(138, 10, 301),
(139, 10, 383),
(140, 10, 384),
(141, 10, 385),
(142, 10, 386),
(143, 10, 387),
(144, 10, 390),
(145, 10, 398),
(146, 10, 421),
(147, 10, 422),
(148, 10, 483),
(149, 10, 484),
(150, 10, 496),
(151, 10, 579),
(152, 10, 302),
(153, 10, 425),
(154, 10, 426),
(155, 10, 427),
(156, 10, 428),
(157, 10, 429),
(158, 10, 430),
(159, 10, 431),
(160, 10, 432),
(161, 10, 434),
(162, 10, 303),
(163, 10, 544),
(164, 10, 545),
(165, 10, 546),
(166, 10, 551),
(167, 10, 552),
(168, 10, 553),
(169, 10, 555),
(170, 10, 556),
(171, 10, 557),
(172, 10, 558),
(173, 10, 561),
(174, 10, 308),
(175, 10, 310),
(176, 10, 376),
(177, 10, 311),
(178, 10, 312),
(179, 10, 314),
(180, 10, 315),
(181, 10, 519),
(182, 10, 316),
(183, 10, 317),
(184, 10, 522),
(185, 10, 318),
(186, 10, 319),
(187, 10, 320),
(188, 10, 321),
(189, 10, 322),
(190, 10, 323),
(191, 11, 14),
(192, 11, 15),
(193, 11, 111),
(194, 11, 271),
(195, 11, 272),
(196, 11, 273),
(197, 11, 274),
(198, 11, 275),
(199, 11, 276),
(200, 11, 279),
(201, 11, 280),
(202, 11, 281),
(203, 11, 282),
(204, 11, 283),
(205, 11, 284),
(206, 11, 285),
(207, 11, 286),
(208, 11, 287),
(209, 11, 288),
(210, 11, 289),
(211, 11, 290),
(212, 11, 291),
(213, 11, 292),
(214, 11, 293),
(215, 11, 294),
(216, 11, 332),
(217, 11, 372),
(218, 11, 509),
(219, 11, 513),
(220, 11, 277),
(221, 11, 278),
(222, 11, 333),
(223, 11, 334),
(224, 11, 335),
(225, 11, 336),
(226, 11, 337),
(227, 11, 338),
(228, 11, 339),
(229, 11, 340),
(230, 11, 341),
(231, 11, 342),
(232, 11, 343),
(233, 11, 344),
(234, 11, 345),
(235, 11, 346),
(236, 11, 347),
(237, 11, 349),
(238, 11, 350),
(239, 11, 351),
(240, 11, 352),
(241, 11, 353),
(242, 11, 354),
(243, 11, 355),
(244, 11, 356),
(245, 11, 357),
(246, 11, 358),
(247, 11, 359),
(248, 11, 360),
(249, 11, 361),
(250, 11, 362),
(251, 11, 363),
(252, 11, 510),
(253, 11, 511),
(254, 11, 512),
(255, 11, 296),
(256, 11, 295),
(257, 11, 304),
(258, 11, 305),
(259, 11, 306),
(260, 11, 364),
(261, 11, 500),
(262, 11, 297),
(263, 11, 324),
(264, 11, 331),
(265, 11, 381),
(266, 11, 382),
(267, 11, 389),
(268, 11, 399),
(269, 11, 514),
(270, 11, 586),
(271, 11, 298),
(272, 11, 299),
(273, 11, 326),
(274, 11, 378),
(275, 11, 379),
(276, 11, 388),
(277, 11, 397),
(278, 11, 436),
(279, 11, 437),
(280, 11, 452),
(281, 11, 460),
(282, 11, 464),
(283, 11, 300),
(284, 11, 473),
(285, 11, 474),
(286, 11, 301),
(287, 11, 384),
(288, 11, 385),
(289, 11, 386),
(290, 11, 387),
(291, 11, 422),
(292, 11, 483),
(293, 11, 484),
(294, 11, 496),
(295, 11, 579),
(296, 11, 302),
(297, 11, 429),
(298, 11, 430),
(299, 11, 431),
(300, 11, 432),
(301, 11, 434),
(302, 11, 303),
(303, 11, 544),
(304, 11, 545),
(305, 11, 546),
(306, 11, 551),
(307, 11, 552),
(308, 11, 553),
(309, 11, 555),
(310, 11, 556),
(311, 11, 557),
(312, 11, 558),
(313, 11, 561),
(314, 11, 308),
(315, 11, 310),
(316, 11, 376),
(317, 11, 311),
(318, 11, 312),
(319, 11, 314),
(320, 11, 315),
(321, 11, 519),
(322, 11, 319),
(323, 11, 320),
(324, 11, 321),
(325, 11, 322),
(326, 11, 323),
(327, 9, 15),
(328, 9, 111),
(329, 9, 296),
(330, 9, 295),
(331, 9, 305),
(332, 9, 306),
(333, 9, 364),
(334, 9, 380),
(335, 9, 392),
(336, 9, 393),
(337, 9, 500),
(338, 9, 503),
(339, 9, 504),
(340, 9, 505),
(341, 9, 523),
(342, 9, 524),
(343, 9, 525),
(344, 9, 526),
(345, 9, 527),
(346, 9, 528),
(347, 9, 297),
(348, 9, 324),
(349, 9, 331),
(350, 9, 381),
(351, 9, 382),
(352, 9, 389),
(353, 9, 440),
(354, 9, 514),
(355, 9, 532),
(356, 9, 533),
(357, 9, 534),
(358, 9, 535),
(359, 9, 586),
(360, 9, 298),
(361, 9, 299),
(362, 9, 326),
(363, 9, 378),
(364, 9, 379),
(365, 9, 388),
(366, 9, 451),
(367, 9, 452),
(368, 9, 529),
(369, 9, 530),
(370, 9, 531),
(371, 9, 300),
(372, 9, 474),
(373, 9, 536),
(374, 9, 537),
(375, 9, 538),
(376, 9, 539),
(377, 9, 301),
(378, 9, 384),
(379, 9, 385),
(380, 9, 386),
(381, 9, 540),
(382, 9, 541),
(383, 9, 542),
(384, 9, 543),
(385, 9, 302),
(386, 9, 429),
(387, 9, 303),
(388, 9, 545),
(389, 9, 546),
(390, 9, 556),
(391, 9, 562),
(392, 9, 563),
(393, 9, 564),
(394, 9, 565),
(395, 9, 316),
(396, 9, 317),
(397, 9, 522),
(398, 9, 318),
(399, 9, 320),
(400, 9, 580),
(401, 9, 581),
(402, 9, 582),
(403, 9, 583),
(404, 8, 79),
(405, 8, 271),
(406, 8, 275),
(407, 8, 276),
(408, 8, 279),
(409, 8, 280),
(410, 8, 281),
(411, 8, 282),
(412, 8, 283),
(413, 8, 284),
(414, 8, 285),
(415, 8, 286),
(416, 8, 287),
(417, 8, 288),
(418, 8, 289),
(419, 8, 290),
(420, 8, 291),
(421, 8, 292),
(422, 8, 293),
(423, 8, 294),
(424, 8, 332),
(425, 8, 372),
(426, 8, 509),
(427, 8, 513),
(428, 8, 277),
(429, 8, 278),
(430, 8, 333),
(431, 8, 334),
(432, 8, 335),
(433, 8, 336),
(434, 8, 337),
(435, 8, 338),
(436, 8, 339),
(437, 8, 340),
(438, 8, 341),
(439, 8, 342),
(440, 8, 343),
(441, 8, 344),
(442, 8, 345),
(443, 8, 346),
(444, 8, 347),
(445, 8, 349),
(446, 8, 350),
(447, 8, 351),
(448, 8, 352),
(449, 8, 353),
(450, 8, 354),
(451, 8, 355),
(452, 8, 356),
(453, 8, 357),
(454, 8, 358),
(455, 8, 359),
(456, 8, 360),
(457, 8, 361),
(458, 8, 362),
(459, 8, 363),
(460, 8, 510),
(461, 8, 511),
(462, 8, 512),
(463, 8, 296),
(464, 8, 295),
(465, 8, 304),
(466, 8, 305),
(467, 8, 306),
(468, 8, 307),
(469, 8, 364),
(470, 8, 365),
(471, 8, 366),
(472, 8, 367),
(473, 8, 368),
(474, 8, 369),
(475, 8, 370),
(476, 8, 371),
(477, 8, 380),
(478, 8, 391),
(479, 8, 392),
(480, 8, 393),
(481, 8, 499),
(482, 8, 500),
(483, 8, 501),
(484, 8, 502),
(485, 8, 503),
(486, 8, 504),
(487, 8, 505),
(488, 8, 506),
(489, 8, 297),
(490, 8, 324),
(491, 8, 330),
(492, 8, 331),
(493, 8, 381),
(494, 8, 382),
(495, 8, 389),
(496, 8, 399),
(497, 8, 400),
(498, 8, 401),
(499, 8, 402),
(500, 8, 403),
(501, 8, 404),
(502, 8, 405),
(503, 8, 406),
(504, 8, 407),
(505, 8, 408),
(506, 8, 409),
(507, 8, 410),
(508, 8, 411),
(509, 8, 412),
(510, 8, 413),
(511, 8, 414),
(512, 8, 415),
(513, 8, 416),
(514, 8, 417),
(515, 8, 418),
(516, 8, 419),
(517, 8, 420),
(518, 8, 423),
(519, 8, 424),
(520, 8, 439),
(521, 8, 440),
(522, 8, 441),
(523, 8, 442),
(524, 8, 443),
(525, 8, 444),
(526, 8, 445),
(527, 8, 446),
(528, 8, 447),
(529, 8, 448),
(530, 8, 507),
(531, 8, 508),
(532, 8, 514),
(533, 8, 586),
(534, 8, 298),
(535, 8, 299),
(536, 8, 325),
(537, 8, 326),
(538, 8, 327),
(539, 8, 328),
(540, 8, 329),
(541, 8, 373),
(542, 8, 374),
(543, 8, 375),
(544, 8, 377),
(545, 8, 378),
(546, 8, 379),
(547, 8, 388),
(548, 8, 397),
(549, 8, 436),
(550, 8, 437),
(551, 8, 438),
(552, 8, 449),
(553, 8, 450),
(554, 8, 451),
(555, 8, 452),
(556, 8, 453),
(557, 8, 454),
(558, 8, 455),
(559, 8, 456),
(560, 8, 457),
(561, 8, 458),
(562, 8, 459),
(563, 8, 460),
(564, 8, 461),
(565, 8, 463),
(566, 8, 464),
(567, 8, 465),
(568, 8, 300),
(569, 8, 466),
(570, 8, 467),
(571, 8, 468),
(572, 8, 469),
(573, 8, 470),
(574, 8, 471),
(575, 8, 472),
(576, 8, 473),
(577, 8, 474),
(578, 8, 475),
(579, 8, 476),
(580, 8, 477),
(581, 8, 478),
(582, 8, 301),
(583, 8, 383),
(584, 8, 384),
(585, 8, 385),
(586, 8, 386),
(587, 8, 387),
(588, 8, 390),
(589, 8, 398),
(590, 8, 421),
(591, 8, 422),
(592, 8, 479),
(593, 8, 480),
(594, 8, 481),
(595, 8, 482),
(596, 8, 483),
(597, 8, 484),
(598, 8, 485),
(599, 8, 486),
(600, 8, 487),
(601, 8, 488),
(602, 8, 489),
(603, 8, 490),
(604, 8, 491),
(605, 8, 492),
(606, 8, 493),
(607, 8, 494),
(608, 8, 495),
(609, 8, 496),
(610, 8, 497),
(611, 8, 498),
(612, 8, 579),
(613, 8, 302),
(614, 8, 425),
(615, 8, 426),
(616, 8, 427),
(617, 8, 428),
(618, 8, 429),
(619, 8, 430),
(620, 8, 431),
(621, 8, 432),
(622, 8, 433),
(623, 8, 434),
(624, 8, 435),
(625, 8, 303),
(626, 8, 544),
(627, 8, 545),
(628, 8, 546),
(629, 8, 547),
(630, 8, 548),
(631, 8, 549),
(632, 8, 550),
(633, 8, 551),
(634, 8, 552),
(635, 8, 553),
(636, 8, 554),
(637, 8, 555),
(638, 8, 556),
(639, 8, 557),
(640, 8, 558),
(641, 8, 559),
(642, 8, 560),
(643, 8, 308),
(644, 8, 310),
(645, 8, 376),
(646, 8, 394),
(647, 8, 395),
(648, 8, 396),
(649, 8, 311),
(650, 8, 312),
(651, 8, 313),
(652, 8, 314),
(653, 8, 315),
(654, 8, 519),
(655, 8, 316),
(656, 8, 317),
(657, 8, 318),
(658, 8, 319),
(659, 8, 320),
(660, 8, 321),
(661, 8, 322),
(662, 8, 323),
(663, 8, 580),
(664, 8, 581),
(665, 8, 582),
(666, 8, 583),
(667, 12, 271),
(668, 12, 275),
(669, 12, 276),
(670, 12, 279),
(671, 12, 280),
(672, 12, 281),
(673, 12, 284),
(674, 12, 332),
(675, 12, 509),
(676, 12, 277),
(677, 12, 278),
(678, 12, 333),
(679, 12, 296),
(680, 12, 295),
(681, 12, 305),
(682, 12, 306),
(683, 12, 364),
(684, 12, 380),
(685, 12, 500),
(686, 12, 297),
(687, 12, 324),
(688, 12, 331),
(689, 12, 381),
(690, 12, 382),
(691, 12, 389),
(692, 12, 399),
(693, 12, 514),
(694, 12, 586),
(695, 12, 298),
(696, 12, 299),
(697, 12, 326),
(698, 12, 378),
(699, 12, 379),
(700, 12, 388),
(701, 12, 397),
(702, 12, 436),
(703, 12, 437),
(704, 12, 452),
(705, 12, 460),
(706, 12, 464),
(707, 12, 300),
(708, 12, 473),
(709, 12, 474),
(710, 12, 301),
(711, 12, 384),
(712, 12, 385),
(713, 12, 386),
(714, 12, 387),
(715, 12, 422),
(716, 12, 483),
(717, 12, 484),
(718, 12, 496),
(719, 12, 579),
(720, 12, 302),
(721, 12, 429),
(722, 12, 430),
(723, 12, 431),
(724, 12, 432),
(725, 12, 434),
(726, 12, 303),
(727, 12, 544),
(728, 12, 545),
(729, 12, 546),
(730, 12, 551),
(731, 12, 552),
(732, 12, 553),
(733, 12, 555),
(734, 12, 556),
(735, 12, 557),
(736, 12, 558),
(737, 12, 561),
(738, 12, 308),
(739, 12, 310),
(740, 12, 376),
(741, 12, 311),
(742, 12, 312),
(743, 12, 314),
(744, 12, 315),
(745, 12, 519),
(746, 12, 318),
(747, 12, 319),
(748, 12, 320),
(749, 12, 321),
(750, 12, 322),
(751, 12, 323);

-- --------------------------------------------------------

--
-- Table structure for table `replys_tb`
--

CREATE TABLE `replys_tb` (
  `replys_id` int(5) NOT NULL,
  `replys_guid` varchar(500) NOT NULL,
  `replys_msg_id` varchar(500) NOT NULL,
  `replys_text` text NOT NULL,
  `replys_from` varchar(500) NOT NULL,
  `replys_to` varchar(500) NOT NULL,
  `replys_is_view_to` varchar(50) NOT NULL,
  `replys_is_view_from` varchar(50) NOT NULL,
  `replys_created_on` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replys_tb`
--

INSERT INTO `replys_tb` (`replys_id`, `replys_guid`, `replys_msg_id`, `replys_text`, `replys_from`, `replys_to`, `replys_is_view_to`, `replys_is_view_from`, `replys_created_on`) VALUES
(22, 'HEtyoL', 'G95Plh', 'reply from majed', 'eWMxBM5x', 'CZf7aA45', '1', '1', '2019-01-25 14:52:33'),
(23, 'HEtyoL', 'G95Plh', 'reply from majed', 'eWMxBM5x', 'kfGg5fBS', '1', '1', '2019-01-25 14:52:33'),
(24, 'Y4Mjco', 'G95Plh', 'from admin', 'CZf7aA45', 'eWMxBM5x', '1', '1', '2019-01-25 14:54:42'),
(25, 'mntwsg', 'G95Plh', 'from admin', 'CZf7aA45', 'eWMxBM5x', '1', '1', '2019-01-25 15:07:09'),
(26, 'N0iBfI', 'G95Plh', 'from majed', 'eWMxBM5x', 'CZf7aA45', '1', '1', '2019-01-25 15:08:56'),
(27, 'N0iBfI', 'G95Plh', 'from majed', 'eWMxBM5x', 'kfGg5fBS', '1', '1', '2019-01-25 15:08:56'),
(28, 'CR57It', 'XiqbrZ', 'reply from admin', 'CZf7aA45', 'CZf7aA45', '1', '1', '2019-01-25 21:16:41'),
(29, 'eFeHbj', 'XiqbrZ', 'reply from anhar', 'LHcc2STj', 'CZf7aA45', '1', '1', '2019-01-25 21:17:26'),
(30, 'eFeHbj', 'XiqbrZ', 'reply from anhar', 'LHcc2STj', 'kfGg5fBS', '1', '1', '2019-01-25 21:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `reply_attachs_tb`
--

CREATE TABLE `reply_attachs_tb` (
  `reply_attachs_id` int(5) NOT NULL,
  `reply_attachs_file` varchar(500) NOT NULL,
  `reply_attachs_reply_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply_attachs_tb`
--

INSERT INTO `reply_attachs_tb` (`reply_attachs_id`, `reply_attachs_file`, `reply_attachs_reply_id`) VALUES
(21, '', 'HEtyoL'),
(22, '', 'Y4Mjco'),
(23, '', 'mntwsg'),
(24, '', 'N0iBfI'),
(25, 'JES proposal (1)(1) (1).pdf', 'CR57It'),
(26, '', 'eFeHbj');

-- --------------------------------------------------------

--
-- Table structure for table `services_tb`
--

CREATE TABLE `services_tb` (
  `services_id` int(5) NOT NULL,
  `services_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services_tb`
--

INSERT INTO `services_tb` (`services_id`, `services_name`) VALUES
(1, 'University'),
(2, 'Collage'),
(3, 'Institution');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `title_email` varchar(500) NOT NULL,
  `is_register` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `img`, `address`, `email`, `title_email`, `is_register`) VALUES
(1, 'Management of Student Documents and Agents', 'yonder_edu_logo1.png', '', 'abod.younis1957@gmail.com', 'Recovery password', 1);

-- --------------------------------------------------------

--
-- Table structure for table `university_tb`
--

CREATE TABLE `university_tb` (
  `university_id` int(5) NOT NULL,
  `university_name` varchar(500) NOT NULL,
  `university_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university_tb`
--

INSERT INTO `university_tb` (`university_id`, `university_name`, `university_type`) VALUES
(1, 'UniKL', '1'),
(3, 'Boston', '2'),
(4, 'UMK', '1'),
(5, 'Elec', '3'),
(6, 'Awesome', '3'),
(7, 'ERICAN', '2'),
(8, 'HELP', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `users_id` int(5) NOT NULL,
  `users_app_guid` varchar(500) NOT NULL,
  `users_admin_id` varchar(500) NOT NULL,
  `users_fullname` varchar(500) NOT NULL,
  `users_whatapp` varchar(500) NOT NULL,
  `users_country` varchar(500) NOT NULL,
  `users_apply` varchar(500) NOT NULL,
  `users_institution` varchar(500) NOT NULL,
  `users_institution_name` varchar(500) NOT NULL,
  `users_degree` varchar(500) NOT NULL,
  `users_university` varchar(500) NOT NULL,
  `users_mode_study` varchar(500) NOT NULL,
  `users_collage_name` varchar(500) NOT NULL,
  `users_program` varchar(500) NOT NULL,
  `users_course` varchar(500) NOT NULL,
  `users_language_name` varchar(500) NOT NULL,
  `users_international_name` varchar(500) NOT NULL,
  `users_other_name` varchar(500) NOT NULL,
  `users_img_passport` varchar(500) NOT NULL,
  `users_img_qualifications` varchar(500) NOT NULL,
  `users_img_certificate` varchar(500) NOT NULL,
  `users_img_english_certificate` varchar(500) NOT NULL,
  `users_status` int(5) NOT NULL,
  `users_notes` varchar(500) NOT NULL,
  `user_file` varchar(500) NOT NULL,
  `users_comission_rate` int(5) NOT NULL,
  `users_commission_status` int(5) NOT NULL,
  `users_accured_com` varchar(500) NOT NULL,
  `users_redeemed` varchar(500) NOT NULL,
  `users_outstanding` varchar(500) NOT NULL,
  `users_redeemed_status` varchar(500) NOT NULL,
  `users_agent_id` varchar(500) NOT NULL,
  `users_by_agent_id` int(5) NOT NULL,
  `users_is_release` int(5) NOT NULL,
  `users_created_on` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`users_id`, `users_app_guid`, `users_admin_id`, `users_fullname`, `users_whatapp`, `users_country`, `users_apply`, `users_institution`, `users_institution_name`, `users_degree`, `users_university`, `users_mode_study`, `users_collage_name`, `users_program`, `users_course`, `users_language_name`, `users_international_name`, `users_other_name`, `users_img_passport`, `users_img_qualifications`, `users_img_certificate`, `users_img_english_certificate`, `users_status`, `users_notes`, `user_file`, `users_comission_rate`, `users_commission_status`, `users_accured_com`, `users_redeemed`, `users_outstanding`, `users_redeemed_status`, `users_agent_id`, `users_by_agent_id`, `users_is_release`, `users_created_on`) VALUES
(13, '45431n', 'OrJlJj1M', 'alaa qumasn', '0097150215463', '191', '1', '1', '', '3', '3', '', 'jh', 'IT', '', '', '', '', 'eb90d0b572aed7f9fdf2b68cf312b9c7.html', '58f92194927bdc56e345f526aea567f7.html', '1996ba95ab4bff4f3d27551d0b35e7e4.jpg', '', 3, '', '', 0, 0, '5000', '20', '', '1', 'AVxU4AqN', 1, 0, '2018-12-12 04:55:47'),
(14, 'SNRRj8', 'DUoEWNex', 'roba qumsan', '00970599266171', '71', '1', '1', '', '5', '9', '', 'Islamic ', 'IT', '', '', '', '', '091f437f40ab4cf8a2454d610f406d47.jpg', '7a15336a2ecb66cd6a374eea23804c6d.jpg', '963f533cbb7df54d71cb2499d9522973.jpg', '', 2, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 1, '2018-12-12 05:18:36'),
(15, 'FaNFRy', '3wjF07KS', 'areej qumsan', '009725463215', '52', '2', '0', '', '', '', '', '', '', 'English', '', '', '', 'e504e95717468bc8e21799a2c4ceefa2.json', 'fc1af534559e790540be25c351722aae.php', '9a7946754c2a8ed41a71a4183ff97d58.css', '', 9, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 1, '2018-12-13 16:01:19'),
(16, 'iOY69o', 'LHcc2STj', 'anhar qumsan', '009752316455', '114', '3', '0', '', '', '', '', '', '', '', '', 'Amircan School', '', '5ac7afaecb38b42fe23739953cedfe62.json', '471be971f6d41bfb35919614809f1af2.txt', '0d83dc1e3a9c748b1dc14c8e073bdaba.html', '', 5, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 0, '2018-12-13 16:03:50'),
(17, 'sds65sd', '6wn0klVp', 'abdallah qumsan', '00975152135', '13', '1', '2', '0', '3', '9', '', 'Islamic university', 'IT', '0', '', '0', '0', '7c64be69d41334902601c1d785ffe191.html', '2c49284b7e87a39400fcd39dcc0df01e.json', '363cbb491d28aae2d42f043ff555443a.json', '', 3, '', '', 0, 0, '', '', '', '', '', 2, 0, '2018-12-13 17:05:06'),
(18, 't4nqq6', 'nyNNViZa', 'mohammed younis qumsan', '00987513122', '15', '2', '0', '0', '', '', '', '0', '0', 'English00', '', '0', '0', 'e585c0aef4611836d1bbc970026943c7.txt', '008afeff8beb394136d1492d9083917a.json', '7181e863cc4e3bda93b42b26bd198416.json', '', 8, '', '', 0, 0, '', '', '', '', '9DiTPY6W', 2, 0, '2018-12-13 17:25:43'),
(19, 't4nqq6', 'nyNNViZa', 'mohammed younis qumsan', '00987513122', '15', '2', '0', '0', '', '', '', '0', '0', 'English00', '', '0', '0', 'e585c0aef4611836d1bbc970026943c7.txt', '008afeff8beb394136d1492d9083917a.json', '7181e863cc4e3bda93b42b26bd198416.json', '', 3, '', '', 0, 0, '', '', '', '', '9DiTPY6W', 2, 0, '2018-12-13 17:25:43'),
(20, 'iOY69o', 'LHcc2STj', 'anhar qumsan', '009752316455', '114', '3', '0', '', '', '', '', '', '', '', '', 'Amircan School', '', '5ac7afaecb38b42fe23739953cedfe62.json', '471be971f6d41bfb35919614809f1af2.txt', '0d83dc1e3a9c748b1dc14c8e073bdaba.html', '', 11, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 0, '2018-12-13 16:03:50'),
(21, 'ybGN6M', 'cxUgzAzm', 'amin', '012115', '71', '3', '0', '', '', '', '', '', '', '', '', 'ddd', '', '', '', '', '', 1, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 0, '2018-12-16 15:20:30'),
(22, '8FCVv5', 'aUVINbj7', 'amin2', '012115', '71', '3', '0', '', '', '', '', '', '', '', '', 'ddd', '', '', '', '', '', 10, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 0, '2018-12-16 15:21:09'),
(23, 'ezhPiO', '2Pyh8mRE', 'mohammed rajab', '0044210316545', '176', '1', '1', '', '5', '9', '', 'London University', 'IT', '', '', '', '', 'dd0a98c466ad3f7c256d745214f2c60b.php', '9b223627f942102a8c6be57738b332de.php', 'df430d4d26e490c99a0e9707f4ae0498.jpg', '', 1, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 0, '2018-12-17 00:09:24'),
(24, 'vsmpkT', '2hUJhU8x', 'Kamal Hatem', '111111009', '198', '1', '1', '', '4', '1', '', '0', 'master of science ', '0', '', '0', '0', '61328d41a817e928f1e234572a24fb8d.jpg', '', '', '', 1, '', '', 0, 0, '', '', '', '', '', 2, 0, '2018-12-19 11:21:47'),
(25, 'tcYoDv', '3YVmmyXc', 'mohammed mohanna', '0051515551', '15', '1', '1', '', '1', '1', '', '', 'IT', '', '', '', '', '', '', '', '', 1, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 0, '2018-12-25 16:59:36'),
(26, '3vx39A', 'uFIRBZ86', 'moahmmed ahmed', '009720599266171', '129', '1', '1', '', '4', '5', '2', '', 'IT', '', '', '', '', '64b5eb0e2e4f820c3085cfaa5b22bbae.html', '1c0b8b862a606dd4f7138d37db7c8774.php', 'dd7808b223234899a143272c7839eda8.png', '1ae37455fa4294113c1ee4d591935088.txt', 1, '', '', 0, 0, '', '', '', '', 'Pb9SfXva', 1, 0, '2018-12-28 22:30:15'),
(27, '6JXXYg', 'AfjVtKLg', 'محمد', 'سامر', '198', '1', '2', '0', '3', '8', '1', '', 'Economy', '', '', '', '', '66f3c713acf124d590f0d26151aaa2d8.pdf', '', '', '', 1, '', '', 0, 0, '', '', '', '', '', 2, 0, '2019-01-10 10:22:20'),
(28, 'xsUptu', 'eWMxBM5x', 'majed ahmed', '0066212232122', '168', '1', '3', 'islamic', '5', '9', '3', 'Islamic university', 'IT', '', '0', '', '', '926d826a4342b33515313438ae09563c.php', '667a4ec9d3e70bbbcaaed3a4098305df.jpg', 'd24039833c13e2f319504202c5e1570f.docx', 'a394256bed1ed5faf8c7f12b29cf8afe.php', 1, '', '', 0, 0, '', '', '', '', '', 2, 0, '2019-01-14 01:39:20'),
(29, 'llUTY7', 'V0mswFGw', 'belal shahata', '055', '21', '2', '0', '', '0', '0', '0', '', '', 'English', '2', '', '', '', '', '', '', 1, '', '', 0, 0, '', '', '', '', 'AVxU4AqN', 1, 0, '2019-01-14 02:21:47'),
(30, 'xBaAWW', 'RyCUJZdX', 'stu of agent 2', '32', '0', '0', '0', '', '0', '0', '0', '', '', '', '0', '', '', '', '', '', '', 1, '', '', 0, 0, '', '', '', '1', 'O8Pn479M', 1, 1, '2019-01-20 11:29:13'),
(31, 'nbyZ4p', 'SDAJezat', 'stu 2 of agent 2', '45464', '1', '2', '0', '', '0', '0', '0', '', '', '6 months', '2', '', '', '36781e69c7d1578b12e165c34aa3baf0.JPG', '', '', '', 1, '', '', 0, 0, '1500', '1500', '', '1', 'O8Pn479M', 1, 1, '2019-01-20 11:32:44'),
(32, 'fBtRcH', '8zxDkTSw', 'stu 3 of agent 2', '234', '13', '1', '1', '', '4', '8', '2', '', 'Informatics', '', '0', '', '', '66bb1ddcd024e427f0ef3d47e17df090.JPG', '', '', '', 1, '', '', 0, 0, '', '', '', '', 'O8Pn479M', 1, 0, '2019-01-20 11:36:43'),
(33, 'Fyepo7', '1CuewMl1', 'Amr Mahmoud', '4654564321', '190', '1', '2', '', '3', '1', '3', '', 'Civil Engineering', '', '0', '', '', '', '', '', '', 1, '', '', 0, 0, '', '', '', '', '', 2, 0, '2019-01-21 10:02:47'),
(34, 'vAotkY', 'QeUHtUQn', 'Azzoz', '15643', '52', '1', '1', '', '3', '1', '2', '', 'Architecture', '', '0', '', '', '037f5e55fc55029cfa97a78ddcfd7ce9.jpg', '', '', '', 1, '', '', 0, 0, '1500', '1500', '', '1', 'O8Pn479M', 2, 1, '2019-01-30 21:33:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `agents_tb`
--
ALTER TABLE `agents_tb`
  ADD PRIMARY KEY (`agents_id`);

--
-- Indexes for table `apply_tb`
--
ALTER TABLE `apply_tb`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `attachs_tb`
--
ALTER TABLE `attachs_tb`
  ADD PRIMARY KEY (`attachs_id`);

--
-- Indexes for table `city_tb`
--
ALTER TABLE `city_tb`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `coordinators_tb`
--
ALTER TABLE `coordinators_tb`
  ADD PRIMARY KEY (`coordinators_id`);

--
-- Indexes for table `country_tb`
--
ALTER TABLE `country_tb`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `coupons_tb`
--
ALTER TABLE `coupons_tb`
  ADD PRIMARY KEY (`coupons_id`);

--
-- Indexes for table `degree_tb`
--
ALTER TABLE `degree_tb`
  ADD PRIMARY KEY (`degree_id`);

--
-- Indexes for table `gender_tb`
--
ALTER TABLE `gender_tb`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `institution_tb`
--
ALTER TABLE `institution_tb`
  ADD PRIMARY KEY (`institution_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_center_tb`
--
ALTER TABLE `language_center_tb`
  ADD PRIMARY KEY (`language_center_id`);

--
-- Indexes for table `messages_tb`
--
ALTER TABLE `messages_tb`
  ADD PRIMARY KEY (`messages_id`);

--
-- Indexes for table `mode_study`
--
ALTER TABLE `mode_study`
  ADD PRIMARY KEY (`mode_study_id`);

--
-- Indexes for table `notifications_tb`
--
ALTER TABLE `notifications_tb`
  ADD PRIMARY KEY (`notifications_id`);

--
-- Indexes for table `receipts_tb`
--
ALTER TABLE `receipts_tb`
  ADD PRIMARY KEY (`receipts_id`);

--
-- Indexes for table `rel_role_action`
--
ALTER TABLE `rel_role_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replys_tb`
--
ALTER TABLE `replys_tb`
  ADD PRIMARY KEY (`replys_id`);

--
-- Indexes for table `reply_attachs_tb`
--
ALTER TABLE `reply_attachs_tb`
  ADD PRIMARY KEY (`reply_attachs_id`);

--
-- Indexes for table `services_tb`
--
ALTER TABLE `services_tb`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_tb`
--
ALTER TABLE `university_tb`
  ADD PRIMARY KEY (`university_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `agents_tb`
--
ALTER TABLE `agents_tb`
  MODIFY `agents_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `apply_tb`
--
ALTER TABLE `apply_tb`
  MODIFY `apply_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attachs_tb`
--
ALTER TABLE `attachs_tb`
  MODIFY `attachs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_tb`
--
ALTER TABLE `city_tb`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coordinators_tb`
--
ALTER TABLE `coordinators_tb`
  MODIFY `coordinators_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country_tb`
--
ALTER TABLE `country_tb`
  MODIFY `country_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `coupons_tb`
--
ALTER TABLE `coupons_tb`
  MODIFY `coupons_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `degree_tb`
--
ALTER TABLE `degree_tb`
  MODIFY `degree_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gender_tb`
--
ALTER TABLE `gender_tb`
  MODIFY `gender_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institution_tb`
--
ALTER TABLE `institution_tb`
  MODIFY `institution_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `language_center_tb`
--
ALTER TABLE `language_center_tb`
  MODIFY `language_center_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages_tb`
--
ALTER TABLE `messages_tb`
  MODIFY `messages_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `mode_study`
--
ALTER TABLE `mode_study`
  MODIFY `mode_study_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications_tb`
--
ALTER TABLE `notifications_tb`
  MODIFY `notifications_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `receipts_tb`
--
ALTER TABLE `receipts_tb`
  MODIFY `receipts_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rel_role_action`
--
ALTER TABLE `rel_role_action`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;

--
-- AUTO_INCREMENT for table `replys_tb`
--
ALTER TABLE `replys_tb`
  MODIFY `replys_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reply_attachs_tb`
--
ALTER TABLE `reply_attachs_tb`
  MODIFY `reply_attachs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services_tb`
--
ALTER TABLE `services_tb`
  MODIFY `services_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `university_tb`
--
ALTER TABLE `university_tb`
  MODIFY `university_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `users_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
