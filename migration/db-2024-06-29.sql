INSERT INTO doctor (id, doctor_id, name, speciality, address, city, mobile, email, website, type, working_hours, facebook, instagram, linkedin, logo, image, status, about, qualification, priority, datetime, hospital_name, rating)
VALUES (2, 'DOC002', 'Dr. John Doe', 'Cardiology', '603,wiliyamgopallawa mathawa', 'Kandy', '+1-123-456-7891', 'johndoe@example.com', 'www.johndoe.com', 'Specialist', 'Monday-Friday, 9am-5pm', 'facebook.com/DrJohnDoe', '@DrJohnDoe', 'linkedin.com/in/DrJohnDoe', 'logo14-09-2021-1631599079.jpeg', 'fea01-09-2021-1630503682.jpg', 'Verified', 'Dr. John Doe is a dedicated cardiologist with years of experience...', 'MD, Cardiology', '1', '2024-06-28 00:00:00', 'New York Heart Center', 5);

INSERT INTO mp_comments (id, mp_id, userid, comment, rating, follow_status, datetime)
VALUES (21, 'DOC002', 'ranjandiroshan@yahoo.com', 'very friendly', 3, 1, '2021-10-24 17:40:51');


CREATE TABLE `midwife` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `midwife_id` VARCHAR(300) NOT NULL,
  `name` TEXT NOT NULL,
  `speciality` TEXT NOT NULL,
  `address` TEXT NOT NULL,
  `map` TEXT NOT NULL,
  `city` TEXT NOT NULL,
  `mobile` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `whatsapp` VARCHAR(15),
  `website` VARCHAR(200) NOT NULL,
  `type` VARCHAR(300) NOT NULL,
  `subtype` VARCHAR(300),
  `working_hours` VARCHAR(300) NOT NULL,
  `facebook` TEXT,
  `instagram` TEXT,
  `linkedin` TEXT,
  `logo` VARCHAR(300) NOT NULL,
  `image` VARCHAR(300) NOT NULL,
  `video` TEXT,
  `status` TEXT NOT NULL,
  `about` LONGTEXT NOT NULL,
  `priority` INT(11) NOT NULL,
  `datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `midwife` (`id`, `midwife_id`, `name`, `speciality`, `address`, `map`, `city`, `mobile`, `email`, `whatsapp`, `website`, `type`, `subtype`, `working_hours`, `facebook`, `instagram`, `linkedin`, `logo`, `image`, `video`, `status`, `about`, `priority`, `datetime`) VALUES
(6, 'midwife-3271136', 'Lanka midwifes PLC', 'Multi Speciality', '578 Elvitigala Mawatha, Colombo 00500', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.007949267762!2d79.87352081477273!3d6.889650295021574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a2d3e1a1f1b%3A0xe505e16b84fb506e!2sLanka%20midwifes!5e0!3m2!1sen!2slk!4v1631624305597!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0115430000', 'info@lankamidwifes.com', '', 'https://www.lankamidwifes.com/', 'Private midwife', '', '24', 'https://www.facebook.com/lankamidwifesplc/', '', '', 'logo14-09-2021-1631599079.jpeg', 'fea01-09-2021-1630503682.jpg', '', 'Verified', '<h6><div style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit; font-size: 1rem;\">Lanka midwifes Corporation PLC commenced operations in Sri Lanka on 7th June 2002, under the brand name of Apollo midwifes, a part of the chain of Apollo midwifes founded by the renown Dr. Pratap C. Reddy in India. As the only purpose built private midwife of its kind in Sri Lanka, Apollo Colombo revolutionised Sri Lanka’s healthcare service, and today under the brand Lanka midwifes, we continue to dominate and lead the healthcare sector. Ours is still considered to be the best health care facility in the country.</span></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit; font-size: 1rem;\">In 2012, we celebrated a decade of excellence in healthcare. Over the past decade, Lanka midwifes has revolutionized the healthcare industry in Sri Lanka through infrastructure development and advancement of its’ product and services, through sizeable investments, with a view to deliver healthcare that is on par with global developments in medical technology. We also play a critical role in the nation’s strategy to provide to provide world-class medical care whilst balancing the equation of affordability and accessibility for all Sri Lankans.</span></div></h6>', 0, '2021-09-01 19:11:22'),
(7, 'midwife-8330399', 'Nine Wells midwife', 'Women and Childcare', '55/1, Kirimandala Mawatha, Narahenpita, Colombo 05, 00500', 'https://www.google.com/maps?ll=6.894982,79.882854&z=13&t=m&hl=en-US&gl=LK&mapclient=embed&cid=16775475475316617991', 'Narahenpita', '0112049988', 'info@ninewellscare.com', '', 'https://www.ninewellsmidwife.lk/', 'Private midwife', '', '24/7', 'https://www.facebook.com/Ninewellsmidwifesl/', '', '', 'logo01-09-2021-1630505474.png', 'fea14-09-2021-1631598655.jpg', '<iframe width=\"1407\" height=\"597\" src=\"https://www.youtube.com/embed/ufsR5ipRiwI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Verified', '<div><b>Our Mission</b></div><div>To be recognized as the Center of Excellence in Woman and Childcare</div><div><br></div><div><b>Our Vision</b></div><div>Harness the expertise of our people and state of the art technology in a professional, safe, secured, and trusted environment of care, through continuous learning and best practices, to offer experiential and affordable healthcare services to our patients locally and internationally.</div>', 1, '2021-09-01 19:41:14'),
(8, 'midwife-3073536', 'Nawaloka midwifes PLC', 'Multi Speciality', 'Nawaloka midwifes PLC, Colombo 2, Sri Lanka.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.481728891075!2d79.853474057672!3d6.921550383208048!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa12560c4d858fc3f!2sNawaloka%20midwifes%20PLC!5e0!3m2!1sen!2sin!4v1631600523751!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo 2', '0115577111', 'nawaloka@slt.lk', '', 'https://www.nawaloka.com/', 'Private midwife', '', '24/7', 'https://www.facebook.com/Nawalokamidwife/photos/?ref=page_internal', '', '', 'logo01-09-2021-1630506930.png', 'fea14-09-2021-1631599995.jpg', '', 'Verified', '<div>The entry of Nawaloka midwifes into the state dominated healthcare sector in 1985, saw the private health care system take root in Sri Lanka. The launch of the midwife and the overwhelming response it received from the people demonstrated a long felt need for superior healthcare in a pleasant environment.</div><div><br></div><div>As Sri Lanka’s first premier multi-specialty midwife, Nawaloka was set up to mirror reputed midwifes in the region which offered advanced medical technology and expert medical care, thus eliminating the need for people to travel out of Sri Lanka for specialized medical treatment.</div><div><br></div><div>The midwife was a pioneering initiative, established under the Chairmanship of Late Deshamanya H. K. Dharmadasa, to be a centre of excellence in high technology diagnostic and curative facilities. Driven by the Vision to be the midwife of Tomorrow, the medical institution has come to be known as a centre of excellence and a preferred healthcare institution in the country.</div>', 0, '2021-09-01 20:05:30'),
(9, 'midwife-4654725', 'New Delmon midwife', 'Multi Speciality', 'Colombo - Galle Main Rd, Colombo 00600', 'https://www.google.com/maps/dir/6.815744,80.0587776/delmon+midwife/@6.8271519,79.8205711,11z/data=!3m1!4b1!4m9!4m8!1m0!1m5!1m1!1s0x3ae25bd75af5d331:0xfb61c0d8eb6cb47d!2m2!1d79.853999!2d6.891052!3e0', 'Colombo', '0112505952', 'info@delmonmidwife.com', '', 'http://delmonmidwife.com/', 'Private midwife', '', '24', 'https://www.facebook.com/newdelmon/', '', '', 'logo14-09-2021-1631599322.png', 'fea14-09-2021-1631599358.jpg', '', 'Verified', '<p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">The New Delmon midwife began as a small nursing home at 104 Havelock Road, Colombo 5, registered under the Private Health Services Regulatory Council in 1969.</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">It is a tertiary care midwife, meaning it offers specialized consultative care, usually on referral from primary or secondary medical care personnel, by specialists working in the midwife who possess specific facilities for advanced medical investigation and treatment.</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">&nbsp;</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">Tertiary care can be provided in midwives, such as New Delmon midwife, or in a facility that is attached to a midwife. The midwife offers 24-hour care to patients who are admitted, irrespective of race, caste or creed. The goal of New Delmon is to provide high-quality and safe care to all patients and to be recognized as a leading private midwife in Colombo.</span></p>', 0, '2021-09-01 20:06:11'),
(10, 'midwife-7243022', 'Ayurveda midwife', 'Ayurveda', 'No 36/9,New Hospital Rd, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sAyurveda%20midwife!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112565305', 'info@ayurvedamidwife.com', '', 'https://www.ayurvedamidwife.com/', 'Private midwife', '', '24', 'https://www.facebook.com/ayurvedamidwife/', '', '', 'logo14-09-2021-1631599120.png', 'fea14-09-2021-1631599142.jpg', '', 'Verified', '<div>Ayurveda is considered to be the oldest healing science in existence, forming the foundation of all others. In Sanskrit, “Ayurveda” means “Science of Life.” Western (Allopathic) medicine tends to focus on the management of disease, while Ayurveda provides the knowledge of how to prevent disease and eliminate its root cause.</div><div><br></div><div>Ayurveda was originally an oral tradition. In India, the ancient wisdom was comprehensively organized and written down over 5,000 years ago in the Vedas (sacred texts of India) and in the Ayurvedic texts known as Samhitas. Today, the ancient knowledge of Ayurveda is combined with modern medicine to offer a complete system of care focused on preventive health, health maintenance, and the treatment of disease.</div>', 0, '2021-09-01 20:07:06');


CREATE TABLE `medicalclinic` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` VARCHAR(300) NOT NULL,
  `name` TEXT NOT NULL,
  `speciality` TEXT NOT NULL,
  `address` TEXT NOT NULL,
  `map` TEXT NOT NULL,
  `city` TEXT NOT NULL,
  `mobile` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `whatsapp` VARCHAR(15),
  `website` VARCHAR(200) NOT NULL,
  `type` VARCHAR(300) NOT NULL,
  `subtype` VARCHAR(300),
  `working_hours` VARCHAR(300) NOT NULL,
  `facebook` TEXT,
  `instagram` TEXT,
  `linkedin` TEXT,
  `logo` VARCHAR(300) NOT NULL,
  `image` VARCHAR(300) NOT NULL,
  `video` TEXT,
  `status` TEXT NOT NULL,
  `about` LONGTEXT NOT NULL,
  `priority` INT(11) NOT NULL,
  `datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `medicalclinic` (`id`, `clinic_id`, `name`, `speciality`, `address`, `map`, `city`, `mobile`, `email`, `whatsapp`, `website`, `type`, `subtype`, `working_hours`, `facebook`, `instagram`, `linkedin`, `logo`, `image`, `video`, `status`, `about`, `priority`, `datetime`) VALUES
(6, 'clinic-3271136', 'Lanka Medical Clinic PLC', 'Multi Speciality', '578 Elvitigala Mawatha, Colombo 00500', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.007949267762!2d79.87352081477273!3d6.889650295021574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a2d3e1a1f1b%3A0xe505e16b84fb506e!2sLanka%20Medical%20Clinic!5e0!3m2!1sen!2slk!4v1631624305597!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0115430000', 'info@lankamedicalclinic.com', '', 'https://www.lankamedicalclinic.com/', 'Private clinic', '', '24', 'https://www.facebook.com/lankamedicalclinicplc/', '', '', 'logo14-09-2021-1631599079.jpeg', 'fea01-09-2021-1630503682.jpg', '', 'Verified', '<h6><div style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit; font-size: 1rem;\">Lanka Medical Clinic Corporation PLC commenced operations in Sri Lanka on 7th June 2002, under the brand name of Apollo Clinic, a part of the chain of Apollo Clinic founded by the renown Dr. Pratap C. Reddy in India. As the only purpose built private clinic of its kind in Sri Lanka, Apollo Colombo revolutionised Sri Lanka’s healthcare service, and today under the brand Lanka Medical Clinic, we continue to dominate and lead the healthcare sector. Ours is still considered to be the best health care facility in the country.</span></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit; font-size: 1rem;\">In 2012, we celebrated a decade of excellence in healthcare. Over the past decade, Lanka Medical Clinic has revolutionized the healthcare industry in Sri Lanka through infrastructure development and advancement of its’ product and services, through sizeable investments, with a view to deliver healthcare that is on par with global developments in medical technology. We also play a critical role in the nation’s strategy to provide to provide world-class medical care whilst balancing the equation of affordability and accessibility for all Sri Lankans.</span></div></h6>', 0, '2021-09-01 19:11:22'),
(7, 'clinic-8330399', 'Nine Wells Medical Clinic', 'Women and Childcare', '55/1, Kirimandala Mawatha, Narahenpita, Colombo 05, 00500', 'https://www.google.com/maps?ll=6.894982,79.882854&z=13&t=m&hl=en-US&gl=LK&mapclient=embed&cid=16775475475316617991', 'Narahenpita', '0112049988', 'info@ninewellsclinic.com', '', 'https://www.ninewellsclinic.lk/', 'Private clinic', '', '24/7', 'https://www.facebook.com/Ninewellsclinic/', '', '', 'logo01-09-2021-1630505474.png', 'fea14-09-2021-1631598655.jpg', '<iframe width=\"1407\" height=\"597\" src=\"https://www.youtube.com/embed/ufsR5ipRiwI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Verified', '<div><b>Our Mission</b></div><div>To be recognized as the Center of Excellence in Woman and Childcare</div><div><br></div><div><b>Our Vision</b></div><div>Harness the expertise of our people and state of the art technology in a professional, safe, secured, and trusted environment of care, through continuous learning and best practices, to offer experiential and affordable healthcare services to our patients locally and internationally.</div>', 1, '2021-09-01 19:41:14'),
(8, 'clinic-3073536', 'Nawaloka Medical Clinic PLC', 'Multi Speciality', 'Nawaloka Medical Clinic PLC, Colombo 2, Sri Lanka.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.481728891075!2d79.853474057672!3d6.921550383208048!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa12560c4d858fc3f!2sNawaloka%20Medical%20Clinic%20PLC!5e0!3m2!1sen!2sin!4v1631600523751!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo 2', '0115577111', 'nawaloka@slt.lk', '', 'https://www.nawalokaclinic.com/', 'Private clinic', '', '24/7', 'https://www.facebook.com/Nawalokaclinic/photos/?ref=page_internal', '', '', 'logo01-09-2021-1630506930.png', 'fea14-09-2021-1631599995.jpg', '', 'Verified', '<div>The entry of Nawaloka Medical Clinic into the state dominated healthcare sector in 1985, saw the private health care system take root in Sri Lanka. The launch of the clinic and the overwhelming response it received from the people demonstrated a long felt need for superior healthcare in a pleasant environment.</div><div><br></div><div>As Sri Lanka’s first premier multi-specialty clinic, Nawaloka was set up to mirror reputed clinics in the region which offered advanced medical technology and expert medical care, thus eliminating the need for people to travel out of Sri Lanka for specialized medical treatment.</div><div><br></div><div>The clinic was a pioneering initiative, established under the Chairmanship of Late Deshamanya H. K. Dharmadasa, to be a centre of excellence in high technology diagnostic and curative facilities. Driven by the Vision to be the clinic of Tomorrow, the medical institution has come to be known as a centre of excellence and a preferred healthcare institution in the country.</div>', 0, '2021-09-01 20:05:30'),
(9, 'clinic-4654725', 'New Delmon Medical Clinic', 'Multi Speciality', 'Colombo - Galle Main Rd, Colombo 00600', 'https://www.google.com/maps/dir/6.815744,80.0587776/delmon+clinic/@6.8271519,79.8205711,11z/data=!3m1!4b1!4m9!4m8!1m0!1m5!1m1!1s0x3ae25bd75af5d331:0xfb61c0d8eb6cb47d!2m2!1d79.853999!2d6.891052!3e0', 'Colombo', '0112505952', 'info@delmonclinic.com', '', 'http://delmonclinic.com/', 'Private clinic', '', '24', 'https://www.facebook.com/newdelmonclinic/', '', '', 'logo14-09-2021-1631599322.png', 'fea14-09-2021-1631599358.jpg', '', 'Verified', '<p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">The New Delmon Medical Clinic began as a small nursing home at 104 Havelock Road, Colombo 5, registered under the Private Health Services Regulatory Council in 1969.</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">It is a tertiary care clinic, meaning it offers specialized consultative care, usually on referral from primary or secondary medical care personnel, by specialists working in the clinic who possess specific facilities for advanced medical investigation and treatment.</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">&nbsp;</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">Tertiary care can be provided in clinics, such as New Delmon Clinic, or in a facility that is attached to a clinic. The clinic offers 24-hour care to patients who are admitted, irrespective of race, caste or creed. The goal of New Delmon is to provide high-quality and safe care to all patients and to be recognized as a leading private clinic in Colombo.</span></p>', 0, '2021-09-01 20:06:11'),
(10, 'clinic-7243022', 'Ayurveda Medical Clinic', 'Ayurveda', 'No 36/9,New Hospital Rd, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sAyurveda%20Medical%20Clinic!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112565305', 'info@ayurvedamedicalclinic.com', '', 'https://www.ayurvedamedicalclinic.com/', 'Private clinic', '', '24', 'https://www.facebook.com/ayurvedamedicalclinic/', '', '', 'logo14-09-2021-1631599120.png', 'fea14-09-2021-1631599142.jpg', '', 'Verified', '<div>Ayurveda is considered to be the oldest healing science in existence, forming the foundation of all others. In Sanskrit, “Ayurveda” means “Science of Life.” Western (Allopathic) medicine tends to focus on the management of disease, while Ayurveda provides the knowledge of how to prevent disease and eliminate its root cause.</div><div><br></div><div>Ayurveda was originally an oral tradition. In India, the ancient wisdom was comprehensively organized and written down over 5,000 years ago in the Vedas (sacred texts of India) and in the Ayurvedic texts known as Samhitas. Today, the ancient knowledge of Ayurveda is combined with modern medicine to offer a complete system of care focused on preventive health, health maintenance, and the treatment of disease.</div>', 0, '2021-09-01 20:07:06');

RENAME TABLE `medicalclinic` TO `medical`;

ALTER TABLE `medical`
CHANGE COLUMN `id` `medical_id` INT(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `pharmacy` (
  `pharmacy_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` TEXT NOT NULL,
  `type` TEXT NOT NULL,
  `address` TEXT NOT NULL,
  `map` TEXT NOT NULL,
  `city` TEXT NOT NULL,
  `mobile` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `whatsapp` VARCHAR(15),
  `website` VARCHAR(200) NOT NULL,
  `subtype` VARCHAR(300),
  `working_hours` VARCHAR(300) NOT NULL,
  `facebook` TEXT,
  `instagram` TEXT,
  `linkedin` TEXT,
  `logo` VARCHAR(300) NOT NULL,
  `image` VARCHAR(300) NOT NULL,
  `video` TEXT,
  `status` TEXT NOT NULL,
  `about` LONGTEXT NOT NULL,
  `priority` INT(11) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pharmacy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `pharmacy` (`pharmacy_id`, `name`, `type`, `address`, `map`, `city`, `mobile`, `email`, `whatsapp`, `website`, `subtype`, `working_hours`, `facebook`, `instagram`, `linkedin`, `logo`, `image`, `video`, `status`, `about`, `priority`, `created_at`)
VALUES
(1, 'Lanka Medical Pharmacy', 'Pharmacy', '578 Elvitigala Mawatha, Colombo 00500', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.007949267762!2d79.87352081477273!3d6.889650295021574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a2d3e1a1f1b%3A0xe505e16b84fb506e!2sLanka%20Medical%20Clinic!5e0!3m2!1sen!2slk!4v1631624305597!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0115430000', 'info@lankamedicalclinic.com', '', 'https://www.lankamedicalclinic.com/', '', '24', 'https://www.facebook.com/lankamedicalclinicplc/', '', '', 'logo14-09-2021-1631599079.jpeg', 'fea01-09-2021-1630503682.jpg', '', 'Verified', '<h6><div style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit; font-size: 1rem;\">Lanka Medical Clinic Corporation PLC commenced operations in Sri Lanka on 7th June 2002, under the brand name of Apollo Clinic, a part of the chain of Apollo Clinic founded by the renown Dr. Pratap C. Reddy in India. As the only purpose built private clinic of its kind in Sri Lanka, Apollo Colombo revolutionised Sri Lanka’s healthcare service, and today under the brand Lanka Medical Clinic, we continue to dominate and lead the healthcare sector. Ours is still considered to be the best health care facility in the country.</span></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit; font-size: 1rem;\">In 2012, we celebrated a decade of excellence in healthcare. Over the past decade, Lanka Medical Clinic has revolutionized the healthcare industry in Sri Lanka through infrastructure development and advancement of its’ product and services, through sizeable investments, with a view to deliver healthcare that is on par with global developments in medical technology. We also play a critical role in the nation’s strategy to provide to provide world-class medical care whilst balancing the equation of affordability and accessibility for all Sri Lankans.</span></div></h6>', 0, '2021-09-01 19:11:22'),
(2, 'Nine Wells Pharmacy', 'Pharmacy', '55/1, Kirimandala Mawatha, Narahenpita, Colombo 05, 00500', 'https://www.google.com/maps?ll=6.894982,79.882854&z=13&t=m&hl=en-US&gl=LK&mapclient=embed&cid=16775475475316617991', 'Narahenpita', '0112049988', 'info@ninewellsclinic.com', '', 'https://www.ninewellsclinic.lk/', '', '24/7', 'https://www.facebook.com/Ninewellsclinic/', '', '', 'logo01-09-2021-1630505474.png', 'fea14-09-2021-1631598655.jpg', '<iframe width=\"1407\" height=\"597\" src=\"https://www.youtube.com/embed/ufsR5ipRiwI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Verified', '<div><b>Our Mission</b></div><div>To be recognized as the Center of Excellence in Woman and Childcare</div><div><br></div><div><b>Our Vision</b></div><div>Harness the expertise of our people and state of the art technology in a professional, safe, secured, and trusted environment of care, through continuous learning and best practices, to offer experiential and affordable healthcare services to our patients locally and internationally.</div>', 1, '2021-09-01 19:41:14'),
(3, 'Nawaloka Pharmacy', 'Pharmacy', 'Nawaloka Medical Clinic PLC, Colombo 2, Sri Lanka.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.481728891075!2d79.853474057672!3d6.921550383208048!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa12560c4d858fc3f!2sNawaloka%20Medical%20Clinic%20PLC!5e0!3m2!1sen!2sin!4v1631600523751!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo 2', '0115577111', 'nawaloka@slt.lk', '', 'https://www.nawalokaclinic.com/', '', '24/7', 'https://www.facebook.com/Nawalokaclinic/photos/?ref=page_internal', '', '', 'logo01-09-2021-1630506930.png', 'fea14-09-2021-1631599995.jpg', '', 'Verified', '<div>The entry of Nawaloka Medical Clinic into the state dominated healthcare sector in 1985, saw the private health care system take root in Sri Lanka. The launch of the clinic and the overwhelming response it received from the people demonstrated a long felt need for superior healthcare in a pleasant environment.</div><div><br></div><div>As Sri Lanka’s first premier multi-specialty clinic, Nawaloka was set up to mirror reputed clinics in the region which offered advanced medical technology and expert medical care, thus eliminating the need for people to travel out of Sri Lanka for specialized medical treatment.</div><div><br></div><div>The clinic was a pioneering initiative, established under the Chairmanship of Late Deshamanya H. K. Dharmadasa, to be a centre of excellence in high technology diagnostic and curative facilities. Driven by the Vision to be the clinic of Tomorrow, the medical institution has come to be known as a centre of excellence and a preferred healthcare institution in the country.</div>', 0, '2021-09-01 20:05:30'),
(4, 'New Delmon Pharmacy', 'Pharmacy', 'Colombo - Galle Main Rd, Colombo 00600', 'https://www.google.com/maps/dir/6.815744,80.0587776/delmon+clinic/@6.8271519,79.8205711,11z/data=!3m1!4b1!4m9!4m8!1m0!1m5!1m1!1s0x3ae25bd75af5d331:0xfb61c0d8eb6cb47d!2m2!1d79.853999!2d6.891052!3e0', 'Colombo', '0112505952', 'info@delmonclinic.com', '', 'http://delmonclinic.com/', '', '24', 'https://www.facebook.com/newdelmonclinic/', '', '', 'logo14-09-2021-1631599322.png', 'fea14-09-2021-1631599358.jpg', '', 'Verified', '<p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">The New Delmon Medical Clinic began as a small nursing home at 104 Havelock Road, Colombo 5, registered under the Private Health Services Regulatory Council in 1969.</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">It is a tertiary care clinic, meaning it offers specialized consultative care, usually on referral from primary or secondary medical care personnel, by specialists working in the clinic who possess specific facilities for advanced medical investigation and treatment.</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">&nbsp;</span></p><p><span style=\"font-size: 14pt; font-family: Arial; color: #2b2b2b; font-weight: normal; background-color: transparent;\">Tertiary care can be provided in clinics, such as New Delmon Clinic, or in a facility that is attached to a clinic. The clinic offers 24-hour care to patients who are admitted, irrespective of race, caste or creed. The goal of New Delmon is to provide high-quality and safe care to all patients and to be recognized as a leading private clinic in Colombo.</span></p>', 0, '2021-09-01 20:06:11'),
(5, 'Ayurveda Pharmacy', 'Pharmacy', 'No 36/9,New Hospital Rd, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sAyurveda%20Medical%20Clinic!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112565305', 'info@ayurvedamedicalclinic.com', '', 'https://www.ayurvedamedicalclinic.com/', '', '24', 'https://www.facebook.com/ayurvedamedicalclinic/', '', '', 'logo14-09-2021-1631599120.png', 'fea14-09-2021-1631599142.jpg', '', 'Verified', '<div>Ayurveda is considered to be the oldest healing science in existence, forming the foundation of all others. In Sanskrit, “Ayurveda” means “Science of Life.” Western (Allopathic) medicine tends to focus on the management of disease, while Ayurveda provides the knowledge of how to prevent disease and eliminate its root cause.</div><div><br></div><div>Ayurveda was originally an oral tradition. In India, the ancient wisdom was comprehensively organized and written down over 5,000 years ago in the Vedas (sacred texts of India) and in the Ayurvedic texts known as Samhitas. Today, the ancient knowledge of Ayurveda is combined with modern medicine to offer a complete system of care focused on preventive health, health maintenance, and the treatment of disease.</div>', 0, '2021-09-01 20:07:06');


ALTER TABLE `pharmacy`
ADD COLUMN `speciality` VARCHAR(200) DEFAULT NULL AFTER `created_at`;


CREATE TABLE `saloon` (
  `saloon_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` TEXT NOT NULL,
  `type` TEXT NOT NULL,
  `address` TEXT NOT NULL,
  `map` TEXT NOT NULL,
  `city` TEXT NOT NULL,
  `mobile` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `whatsapp` VARCHAR(15),
  `website` VARCHAR(200) NOT NULL,
  `subtype` VARCHAR(300),
  `working_hours` VARCHAR(300) NOT NULL,
  `facebook` TEXT,
  `instagram` TEXT,
  `linkedin` TEXT,
  `logo` VARCHAR(300) NOT NULL,
  `image` VARCHAR(300) NOT NULL,
  `video` TEXT,
  `status` TEXT NOT NULL,
  `about` LONGTEXT NOT NULL,
  `priority` INT(11) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `speciality` VARCHAR(200) DEFAULT NULL,
  PRIMARY KEY (`saloon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `saloon` (`saloon_id`,`name`,`speciality`,  `type`, `address`, `map`, `city`, `mobile`, `email`, `whatsapp`, `website`, `subtype`, `working_hours`, `facebook`, `instagram`, `linkedin`, `logo`, `image`, `video`, `status`, `about`, `priority`, `created_at`)
VALUES
(1, 'Salon One', 'unisex', 'Salon', '123 Main St, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sSalon%20One!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112345678', 'info@salonone.com', '', 'https://www.salonone.com/', '', '10-7', 'https://www.facebook.com/salonone/', '', '', 'salon_logo.png', 'salon_image.jpg', '', 'Verified', '<div>Salon One is your premier destination for hair and beauty services in Colombo. We offer a wide range of services including haircuts, styling, coloring, and more.</div>', 0, '2024-06-29 10:00:00'),
(2, 'Salon toona', 'unisex', 'Salon', '123 Main St, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sSalon%20One!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112345678', 'info@salonone.com', '', 'https://www.salonone.com/', '', '10-7', 'https://www.facebook.com/salonone/', '', '', 'salon_logo.png', 'salon_image.jpg', '', 'Verified', '<div>Salon One is your premier destination for hair and beauty services in Colombo. We offer a wide range of services including haircuts, styling, coloring, and more.</div>', 0, '2024-06-29 10:00:00'),
(3, 'Salon malli', 'male', 'Salon', '123 Main St, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sSalon%20One!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112345678', 'info@salonone.com', '', 'https://www.salonone.com/', '', '10-7', 'https://www.facebook.com/salonone/', '', '', 'salon_logo.png', 'salon_image.jpg', '', 'Verified', '<div>Salon One is your premier destination for hair and beauty services in Colombo. We offer a wide range of services including haircuts, styling, coloring, and more.</div>', 1, '2024-06-29 10:00:00');

DROP TABLE IF EXISTS `mpdoctor_gallery`;
DROP TABLE IF EXISTS `mpmidwife_gallery`;
DROP TABLE IF EXISTS `mpmedical_gallery`;
DROP TABLE IF EXISTS `mppharmacy_gallery`;
DROP TABLE IF EXISTS `mpsaloon_gallery`;
DROP TABLE IF EXISTS `mpstudio_gallery`;

CREATE TABLE `mpdoctor_gallery` (
  `id` int(11) NOT NULL,
  `doctor_id` varchar(300) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `mpmidwife_gallery` (
  `id` int(11) NOT NULL,
  `midwife_id` varchar(300) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mpmedical_gallery` (
  `id` int(11) NOT NULL,
  `medical_id` varchar(300) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mppharmacy_gallery` (
  `id` int(11) NOT NULL,
  `pharmacy_id` varchar(300) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mpsaloon_gallery` (
  `id` int(11) NOT NULL,
  `saloon_id` varchar(300) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mpstudio_gallery` (
  `id` int(11) NOT NULL,
  `studio_id` varchar(300) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `mp_comments`;

CREATE TABLE `mp_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mp_id` varchar(300) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `comment` mediumtext NOT NULL,
  `rating` int(11) NOT NULL,
  `follow_status` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `mp_comments` (`mp_id`, `userid`, `comment`, `rating`, `follow_status`, `datetime`) VALUES
('Hospital-8330399', 'hrithiksuthan@gmail.com', 'Good services!', '3', '1', '2021-10-18 13:39:12'),
('Hospital-8330399', 'raprasadh@ymail.com', 'Nice hospital', '2', '1', '2021-10-21 18:09:24'),
('Hospital-8330399', 'ranjandiroshan@yahoo.com', 'very friendly service', '3', '0', '2021-10-24 17:40:51'),
('Hospital-3271136', 'hrithiksuthan@gmail.com', 'Very friendly service', '3', '1', '2021-10-25 15:53:43'),
('Hospital-3271136', 'konduru.nataraju@gmail.com', '', '0', '1', '2021-11-05 11:58:16'),
('Hospital-2894449', 'hrithiksuthan@gmail.com', '', '0', '1', '2022-01-26 15:06:42'),
('Hospital-2020955', 'hrithiksuthan@gmail.com', '', '0', '1', '2022-01-26 15:07:12'),
('Hospital-1278081', 'hrithiksuthan@gmail.com', '', '0', '1', '2022-01-26 15:07:34'),
('Hospital-4654725', 'hrithiksuthan@gmail.com', '', '0', '1', '2022-01-26 15:07:54'),
('Hospital-3073536', 'hrithiksuthan@gmail.com', '', '0', '1', '2022-01-26 15:08:31'),
('Doctor-7283924', 'admin', '123456', '1', '0', '2022-06-21 17:43:34'),
('Hospital-4005242', 'hrithiksuthan@gmail.com', '', '0', '1', '2023-03-03 00:02:34'),
('Hospital-6825390', 'hrithiksuthan@gmail.com', '', '0', '1', '2023-03-03 00:03:06'),
('Hospital-2954853', 'hrithiksuthan@gmail.com', '', '0', '1', '2023-03-03 00:03:28'),
('DOC001', 'ranjandiroshan@yahoo.com', 'very friendly', '3', '1', '2021-10-24 17:40:51'),
('Hospital-8330399', 'konduru.nataraju@gmail.com', '', '0', '1', '2024-07-01 23:30:30'),
('DOC001', 'konduru.nataraju@gmail.com', '', '0', '1', '2024-07-01 23:40:52'),
('7', 'konduru.nataraju@gmail.com', '', '0', '1', '2024-07-02 00:01:13');


CREATE TABLE `studio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studio_id` TEXT NOT NULL,
  `name` TEXT NOT NULL,
  `speciality` VARCHAR(200) DEFAULT NULL,
  `type` TEXT NOT NULL,
  `address` TEXT NOT NULL,
  `map` TEXT NOT NULL,
  `city` TEXT NOT NULL,
  `mobile` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `whatsapp` VARCHAR(15),
  `website` VARCHAR(200) NOT NULL,
  `subtype` VARCHAR(300),
  `working_hours` VARCHAR(300) NOT NULL,
  `facebook` TEXT,
  `instagram` TEXT,
  `linkedin` TEXT,
  `logo` VARCHAR(300) NOT NULL,
  `image` VARCHAR(300) NOT NULL,
  `video` TEXT,
  `status` TEXT NOT NULL,
  `about` LONGTEXT NOT NULL,
  `priority` INT(11) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `studio` (`studio_id`,`name`,`speciality`,  `type`, `address`, `map`, `city`, `mobile`, `email`, `whatsapp`, `website`, `subtype`, `working_hours`, `facebook`, `instagram`, `linkedin`, `logo`, `image`, `video`, `status`, `about`, `priority`, `created_at`)
VALUES
('studio001', 'studio One', 'wedding', 'video', '123 Main St, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sSalon%20One!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112345678', 'info@salonone.com', '', 'https://www.salonone.com/', '', '10-7', 'https://www.facebook.com/salonone/', '', '', 'salon_logo.png', 'salon_image.jpg', '', 'Verified', '<div>Salon One is your premier destination for hair and beauty services in Colombo. We offer a wide range of services including haircuts, styling, coloring, and more.</div>', 0, '2024-06-29 10:00:00'),
('studio002', 'studio toona', 'studio', 'photography', '123 Main St, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sSalon%20One!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112345678', 'info@salonone.com', '', 'https://www.salonone.com/', '', '10-7', 'https://www.facebook.com/salonone/', '', '', 'salon_logo.png', 'salon_image.jpg', '', 'Verified', '<div>Salon One is your premier destination for hair and beauty services in Colombo. We offer a wide range of services including haircuts, styling, coloring, and more.</div>', 0, '2024-06-29 10:00:00'),
('studio003', 'studio pi', 'studio', 'photography', '123 Main St, Colombo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966444201284!2d79.87721501477283!3d6.896473795013687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd20b72f64f%3A0xd69700aef7de28ff!2sSalon%20One!5e0!3m2!1sen!2slk!4v1631597962934!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Colombo', '0112345678', 'info@salonone.com', '', 'https://www.salonone.com/', '', '10-7', 'https://www.facebook.com/salonone/', '', '', 'salon_logo.png', 'salon_image.jpg', '', 'Verified', '<div>Salon One is your premier destination for hair and beauty services in Colombo. We offer a wide range of services including haircuts, styling, coloring, and more.</div>', 1, '2024-06-29 10:00:00');

ALTER TABLE doctor ADD COLUMN video VARCHAR(255) AFTER image;
ALTER TABLE doctor ADD COLUMN map TEXT AFTER address;

UPDATE doctor
SET name = 'Dr. Joe Doe',
    speciality = 'surgery',
    email = 'joe@gmail.com',
    logo = 'joe.jpg',
    image = 'joebg.jpg',
    about = 'Dr. Joe Doe is a dedicated surgeon with years of experience...',
    qualification = 'MD Surgery'
WHERE doctor_id = 'DOC001';

UPDATE doctor
SET name = 'Dr. Sanjeewa Wijesekara',
    mobile = '+9474523658',
    email = 'sanjeewa@gmail.com',
    website = 'www.sanjeewa.com',
    about = 'Dr. Sanjeewa Wijesekara is a dedicated cardiologist with years of experience...',
    hospital_name = 'Asiri Hospital'
WHERE doctor_id = 'DOC002';


CREATE TABLE hospital_working_times (
	  htime_id VARCHAR(300) NOT NULL,
    hospital_id VARCHAR(300) NOT NULL,
    hospital_type VARCHAR(300) NOT NULL,
    branch_id VARCHAR(300),
    monday_open TIME,
    monday_close TIME,
    tuesday_open TIME,
    tuesday_close TIME,
    wednesday_open TIME,
    wednesday_close TIME,
    thursday_open TIME,
    thursday_close TIME,
    friday_open TIME,
    friday_close TIME,
    saturday_open TIME,
    saturday_close TIME,
    sunday_open TIME,
    sunday_close TIME,
    PRIMARY KEY (htime_id)
);
CREATE TABLE hospital_branch (
    hospitalbranchid VARCHAR(50) PRIMARY KEY,
    htime_id VARCHAR(50),
    hospitalid VARCHAR(50),
    branchname VARCHAR(255),
    branchaddr TEXT,
    branchmap TEXT,
    branchcity VARCHAR(100),
    branchcont VARCHAR(15),
    branchwhatsapp VARCHAR(15),
    branchemail VARCHAR(255),
    branchweb VARCHAR(255),
    branchfb VARCHAR(255),
    branchinsta VARCHAR(255),
    branchln VARCHAR(255),
    status VARCHAR(50),
    about TEXT,
    videoembed TEXT,
    logoimage VARCHAR(255),
    featuredimage VARCHAR(255),
    galvideo VARCHAR(255)
);

ALTER TABLE hospital
MODIFY COLUMN video VARCHAR(255) NULL;

ALTER TABLE hospital
MODIFY COLUMN id INT AUTO_INCREMENT PRIMARY KEY;


ALTER TABLE hospital_working_times
ADD COLUMN hospital_branch VARCHAR(255) AFTER hospital_type;

ALTER TABLE hospital_branch
ADD COLUMN hospital_name VARCHAR(255) AFTER hospitalid;

ALTER TABLE `hospital` 
ADD COLUMN `is_main` VARCHAR(45) NOT NULL AFTER `address`;

ALTER TABLE doctor
MODIFY COLUMN id INT AUTO_INCREMENT PRIMARY KEY;

CREATE TABLE doctor_working_times (
	dtime_id VARCHAR(300) NOT NULL,
    doctor_id VARCHAR(300) NOT NULL,
    doctor_type VARCHAR(300) NOT NULL,
    monday_open TIME,
    monday_close TIME,
    tuesday_open TIME,
    tuesday_close TIME,
    wednesday_open TIME,
    wednesday_close TIME,
    thursday_open TIME,
    thursday_close TIME,
    friday_open TIME,
    friday_close TIME,
    saturday_open TIME,
    saturday_close TIME,
    sunday_open TIME,
    sunday_close TIME,
    PRIMARY KEY (dtime_id)
);
CREATE TABLE midwife_speciality (
	id INT AUTO_INCREMENT PRIMARY KEY,
	speciality TEXT
);
CREATE TABLE studio_speciality (
	id INT AUTO_INCREMENT PRIMARY KEY,
	speciality TEXT
);
CREATE TABLE medical_speciality (
	id INT AUTO_INCREMENT PRIMARY KEY,
	speciality TEXT
);
CREATE TABLE pharmacy_speciality (
	id INT AUTO_INCREMENT PRIMARY KEY,
	speciality TEXT
);
CREATE TABLE saloon_speciality (
	id INT AUTO_INCREMENT PRIMARY KEY,
	speciality TEXT
);

CREATE TABLE midwife_working_times (
	mwtime_id VARCHAR(300) NOT NULL,
    midwife_id VARCHAR(300) NOT NULL,
    midwife_type VARCHAR(300) NOT NULL,
    branch_id VARCHAR(300),
    monday_open TIME,
    monday_close TIME,
    tuesday_open TIME,
    tuesday_close TIME,
    wednesday_open TIME,
    wednesday_close TIME,
    thursday_open TIME,
    thursday_close TIME,
    friday_open TIME,
    friday_close TIME,
    saturday_open TIME,
    saturday_close TIME,
    sunday_open TIME,
    sunday_close TIME,
    PRIMARY KEY (mwtime_id)
);
CREATE TABLE medical_working_times (
	metime_id VARCHAR(300) NOT NULL,
    medical_id VARCHAR(300) NOT NULL,
    medical_type VARCHAR(300) NOT NULL,
    branch_id VARCHAR(300),
    monday_open TIME,
    monday_close TIME,
    tuesday_open TIME,
    tuesday_close TIME,
    wednesday_open TIME,
    wednesday_close TIME,
    thursday_open TIME,
    thursday_close TIME,
    friday_open TIME,
    friday_close TIME,
    saturday_open TIME,
    saturday_close TIME,
    sunday_open TIME,
    sunday_close TIME,
    PRIMARY KEY (metime_id)
);
CREATE TABLE saloon_working_times (
	sltime_id VARCHAR(300) NOT NULL,
    saloon_id VARCHAR(300) NOT NULL,
    saloon_type VARCHAR(300) NOT NULL,
    branch_id VARCHAR(300),
    monday_open TIME,
    monday_close TIME,
    tuesday_open TIME,
    tuesday_close TIME,
    wednesday_open TIME,
    wednesday_close TIME,
    thursday_open TIME,
    thursday_close TIME,
    friday_open TIME,
    friday_close TIME,
    saturday_open TIME,
    saturday_close TIME,
    sunday_open TIME,
    sunday_close TIME,
    PRIMARY KEY (sltime_id)
);
CREATE TABLE studio_working_times (
	sttime_id VARCHAR(300) NOT NULL,
    studio_id VARCHAR(300) NOT NULL,
    studio_type VARCHAR(300) NOT NULL,
    branch_id VARCHAR(300),
    monday_open TIME,
    monday_close TIME,
    tuesday_open TIME,
    tuesday_close TIME,
    wednesday_open TIME,
    wednesday_close TIME,
    thursday_open TIME,
    thursday_close TIME,
    friday_open TIME,
    friday_close TIME,
    saturday_open TIME,
    saturday_close TIME,
    sunday_open TIME,
    sunday_close TIME,
    PRIMARY KEY (sttime_id)
);
CREATE TABLE pharmacy_working_times (
	ptime_id VARCHAR(300) NOT NULL,
    pharmacy_id VARCHAR(300) NOT NULL,
    pharmacy_type VARCHAR(300) NOT NULL,
    branch_id VARCHAR(300),
    monday_open TIME,
    monday_close TIME,
    tuesday_open TIME,
    tuesday_close TIME,
    wednesday_open TIME,
    wednesday_close TIME,
    thursday_open TIME,
    thursday_close TIME,
    friday_open TIME,
    friday_close TIME,
    saturday_open TIME,
    saturday_close TIME,
    sunday_open TIME,
    sunday_close TIME,
    PRIMARY KEY (ptime_id)
);
ALTER TABLE `midwife` 
ADD COLUMN `is_main` VARCHAR(45) NOT NULL AFTER `address`;

ALTER TABLE `studio` 
ADD COLUMN `is_main` VARCHAR(45) NOT NULL AFTER `address`;

ALTER TABLE `medical` 
ADD COLUMN `is_main` VARCHAR(45) NOT NULL AFTER `address`;

ALTER TABLE `pharmacy` 
ADD COLUMN `is_main` VARCHAR(45) NOT NULL AFTER `address`;

ALTER TABLE `saloon` 
ADD COLUMN `is_main` VARCHAR(45) NOT NULL AFTER `address`;

CREATE TABLE midwife_branch (
	midwifebranchid VARCHAR(50) PRIMARY KEY,
    mwtime_id VARCHAR(50),
    midwife_id VARCHAR(50),
    branchname VARCHAR(255),
    branchaddr TEXT,
    branchmap TEXT,
    branchcity VARCHAR(100),
    branchcont VARCHAR(15),
    branchwhatsapp VARCHAR(15),
    branchemail VARCHAR(255),
    branchweb VARCHAR(255),
    branchfb VARCHAR(255),
    branchinsta VARCHAR(255),
    branchln VARCHAR(255),
    status VARCHAR(50),
    about TEXT,
    videoembed TEXT,
    logoimage VARCHAR(255),
    featuredimage VARCHAR(255),
    galvideo VARCHAR(255)
);
CREATE TABLE medical_branch (
	medicalbranchid VARCHAR(50) PRIMARY KEY,
    metime_id VARCHAR(50),
    medical_id VARCHAR(50),
    branchname VARCHAR(255),
    branchaddr TEXT,
    branchmap TEXT,
    branchcity VARCHAR(100),
    branchcont VARCHAR(15),
    branchwhatsapp VARCHAR(15),
    branchemail VARCHAR(255),
    branchweb VARCHAR(255),
    branchfb VARCHAR(255),
    branchinsta VARCHAR(255),
    branchln VARCHAR(255),
    status VARCHAR(50),
    about TEXT,
    videoembed TEXT,
    logoimage VARCHAR(255),
    featuredimage VARCHAR(255),
    galvideo VARCHAR(255)
);
CREATE TABLE saloon_branch (
	saloonbranchid VARCHAR(50) PRIMARY KEY,
    sltime_id VARCHAR(50),
    saloon_id VARCHAR(50),
    branchname VARCHAR(255),
    branchaddr TEXT,
    branchmap TEXT,
    branchcity VARCHAR(100),
    branchcont VARCHAR(15),
    branchwhatsapp VARCHAR(15),
    branchemail VARCHAR(255),
    branchweb VARCHAR(255),
    branchfb VARCHAR(255),
    branchinsta VARCHAR(255),
    branchln VARCHAR(255),
    status VARCHAR(50),
    about TEXT,
    videoembed TEXT,
    logoimage VARCHAR(255),
    featuredimage VARCHAR(255),
    galvideo VARCHAR(255)
);
CREATE TABLE studio_branch (
	studiobranchid VARCHAR(50) PRIMARY KEY,
    sttime_id VARCHAR(50),
    studio_id VARCHAR(50),
    branchname VARCHAR(255),
    branchaddr TEXT,
    branchmap TEXT,
    branchcity VARCHAR(100),
    branchcont VARCHAR(15),
    branchwhatsapp VARCHAR(15),
    branchemail VARCHAR(255),
    branchweb VARCHAR(255),
    branchfb VARCHAR(255),
    branchinsta VARCHAR(255),
    branchln VARCHAR(255),
    status VARCHAR(50),
    about TEXT,
    videoembed TEXT,
    logoimage VARCHAR(255),
    featuredimage VARCHAR(255),
    galvideo VARCHAR(255)
);
CREATE TABLE pharmacy_branch (
	pharmacybranchid VARCHAR(50) PRIMARY KEY,
    ptime_id VARCHAR(50),
    pharmacy_id VARCHAR(50),
    branchname VARCHAR(255),
    branchaddr TEXT,
    branchmap TEXT,
    branchcity VARCHAR(100),
    branchcont VARCHAR(15),
    branchwhatsapp VARCHAR(15),
    branchemail VARCHAR(255),
    branchweb VARCHAR(255),
    branchfb VARCHAR(255),
    branchinsta VARCHAR(255),
    branchln VARCHAR(255),
    status VARCHAR(50),
    about TEXT,
    videoembed TEXT,
    logoimage VARCHAR(255),
    featuredimage VARCHAR(255),
    galvideo VARCHAR(255)
);

-- akila is here

ALTER TABLE `hospital` 
ADD COLUMN `main_id` INT NULL AFTER `is_main`,
CHANGE COLUMN `is_main` `is_main` CHAR(1) NOT NULL ;

ALTER TABLE `mammy`.`hospital_working_times` 
DROP COLUMN `branch_id`,
DROP COLUMN `hospital_branch`;

-- thushitha is here