PGDMP         $        
        t           timeline    9.5.2    9.5.2 4    t           0    0    ENCODING    ENCODING     #   SET client_encoding = 'SQL_ASCII';
                       false            u           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            v           1262    24576    timeline    DATABASE     �   CREATE DATABASE timeline WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'French_France.1252' LC_CTYPE = 'French_France.1252';
    DROP DATABASE timeline;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            w           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    6            x           0    0    public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    6                        3079    12355    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            y           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    32811    comment    TABLE     ]  CREATE TABLE comment (
    id integer NOT NULL,
    text character varying(255) NOT NULL,
    date timestamp without time zone NOT NULL,
    photo_id integer NOT NULL,
    user_id integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.comment;
       public         postgres    false    6            �            1259    32809    comment_id_seq    SEQUENCE     p   CREATE SEQUENCE comment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.comment_id_seq;
       public       postgres    false    191    6            z           0    0    comment_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE comment_id_seq OWNED BY comment.id;
            public       postgres    false    190            �            1259    32784    event    TABLE     _  CREATE TABLE event (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    date date NOT NULL,
    url_photo_couverture character varying(255) NOT NULL,
    user_id integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.event;
       public         postgres    false    6            �            1259    32782    event_id_seq    SEQUENCE     n   CREATE SEQUENCE event_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.event_id_seq;
       public       postgres    false    185    6            {           0    0    event_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE event_id_seq OWNED BY event.id;
            public       postgres    false    184            �            1259    32819    jaime    TABLE       CREATE TABLE jaime (
    id integer NOT NULL,
    photo_id integer NOT NULL,
    user_id integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.jaime;
       public         postgres    false    6            �            1259    32817    jaime_id_seq    SEQUENCE     n   CREATE SEQUENCE jaime_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.jaime_id_seq;
       public       postgres    false    6    193            |           0    0    jaime_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE jaime_id_seq OWNED BY jaime.id;
            public       postgres    false    192            �            1259    32768 
   migrations    TABLE     g   CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false    6            �            1259    32803    publication    TABLE     n  CREATE TABLE publication (
    id integer NOT NULL,
    url character varying(255) NOT NULL,
    validation integer NOT NULL,
    type integer NOT NULL,
    rubric_id integer NOT NULL,
    user_id integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.publication;
       public         postgres    false    6            �            1259    32801    publication_id_seq    SEQUENCE     t   CREATE SEQUENCE publication_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.publication_id_seq;
       public       postgres    false    6    189            }           0    0    publication_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE publication_id_seq OWNED BY publication.id;
            public       postgres    false    188            �            1259    32795    rubric    TABLE     e  CREATE TABLE rubric (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    start time without time zone NOT NULL,
    "end" time without time zone NOT NULL,
    event_id integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.rubric;
       public         postgres    false    6            �            1259    32793    rubric_id_seq    SEQUENCE     o   CREATE SEQUENCE rubric_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.rubric_id_seq;
       public       postgres    false    6    187            ~           0    0    rubric_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE rubric_id_seq OWNED BY rubric.id;
            public       postgres    false    186            �            1259    32773    user    TABLE     �  CREATE TABLE "user" (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    firstname character varying(255) NOT NULL,
    tel character varying(255) NOT NULL,
    adress character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    birthdate date NOT NULL,
    gender character varying(255) NOT NULL,
    promo integer NOT NULL,
    url_photo character varying(255) NOT NULL,
    "isAdmin" integer NOT NULL,
    "isPres" integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public."user";
       public         postgres    false    6            �            1259    32771    user_id_seq    SEQUENCE     m   CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public       postgres    false    6    183                       0    0    user_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE user_id_seq OWNED BY "user".id;
            public       postgres    false    182            �           2604    32814    id    DEFAULT     Z   ALTER TABLE ONLY comment ALTER COLUMN id SET DEFAULT nextval('comment_id_seq'::regclass);
 9   ALTER TABLE public.comment ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    190    191    191            �           2604    32787    id    DEFAULT     V   ALTER TABLE ONLY event ALTER COLUMN id SET DEFAULT nextval('event_id_seq'::regclass);
 7   ALTER TABLE public.event ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    185    184    185            �           2604    32822    id    DEFAULT     V   ALTER TABLE ONLY jaime ALTER COLUMN id SET DEFAULT nextval('jaime_id_seq'::regclass);
 7   ALTER TABLE public.jaime ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    193    192    193            �           2604    32806    id    DEFAULT     b   ALTER TABLE ONLY publication ALTER COLUMN id SET DEFAULT nextval('publication_id_seq'::regclass);
 =   ALTER TABLE public.publication ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    189    188    189            �           2604    32798    id    DEFAULT     X   ALTER TABLE ONLY rubric ALTER COLUMN id SET DEFAULT nextval('rubric_id_seq'::regclass);
 8   ALTER TABLE public.rubric ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    187    186    187            �           2604    32776    id    DEFAULT     V   ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);
 8   ALTER TABLE public."user" ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    182    183    183            o          0    32811    comment 
   TABLE DATA                     public       postgres    false    191   �5       �           0    0    comment_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('comment_id_seq', 20, true);
            public       postgres    false    190            i          0    32784    event 
   TABLE DATA                     public       postgres    false    185   �6       �           0    0    event_id_seq    SEQUENCE SET     4   SELECT pg_catalog.setval('event_id_seq', 12, true);
            public       postgres    false    184            q          0    32819    jaime 
   TABLE DATA                     public       postgres    false    193   �7       �           0    0    jaime_id_seq    SEQUENCE SET     4   SELECT pg_catalog.setval('jaime_id_seq', 12, true);
            public       postgres    false    192            e          0    32768 
   migrations 
   TABLE DATA                     public       postgres    false    181   H8       m          0    32803    publication 
   TABLE DATA                     public       postgres    false    189   9       �           0    0    publication_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('publication_id_seq', 24, true);
            public       postgres    false    188            k          0    32795    rubric 
   TABLE DATA                     public       postgres    false    187   �:       �           0    0    rubric_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('rubric_id_seq', 20, true);
            public       postgres    false    186            g          0    32773    user 
   TABLE DATA                     public       postgres    false    183   O<       �           0    0    user_id_seq    SEQUENCE SET     3   SELECT pg_catalog.setval('user_id_seq', 16, true);
            public       postgres    false    182            �           2606    32816    comment_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY comment
    ADD CONSTRAINT comment_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.comment DROP CONSTRAINT comment_pkey;
       public         postgres    false    191    191            �           2606    32792 
   event_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY event
    ADD CONSTRAINT event_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.event DROP CONSTRAINT event_pkey;
       public         postgres    false    185    185            �           2606    32824 
   jaime_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY jaime
    ADD CONSTRAINT jaime_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.jaime DROP CONSTRAINT jaime_pkey;
       public         postgres    false    193    193            �           2606    32808    publication_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY publication
    ADD CONSTRAINT publication_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.publication DROP CONSTRAINT publication_pkey;
       public         postgres    false    189    189            �           2606    32800    rubric_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY rubric
    ADD CONSTRAINT rubric_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.rubric DROP CONSTRAINT rubric_pkey;
       public         postgres    false    187    187            �           2606    32781 	   user_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public."user" DROP CONSTRAINT user_pkey;
       public         postgres    false    183    183            o   �   x���Mk�0�����l'n�C��A?v-m��%M]Rg��O--�l�1F�A��Ai�Z,א��w(\������r���9؝G��y������i��fO�j<q(Z�Q���Rw��~
o�f��Iȁ��b�)!�3�g")�|12",o�o��7�(6Q��|��k���!) �����'"z@D)&F�� SDQ����:�/����##m��]�7S&�%��ްILg�����P�H�L*A��ޭ      i   �   x����J�@��y������nӊ�$�C4DlҞ��f�1�d�f7��s�bn�BQě30�����%�j�A�d�@�&�d�1��q��C�=)��Rف��zT{��h��P�s�Q/�2(5�5�ƙ:y짰��7�&���5��]/�/g��a0NuSTԟ�����qU�Xu��U��$�8>��8�<���W^���������?Xu������my[�e��_��b��w�/�1{�;o��?      q   �   x�����0Ew��n@R���"ur` !5p% /B����8��v��Nn��X!7��v	��3̗�N͛�Z>��Hc熝ntg8/�Z�ֺ��9�i_�Y�`ˠ������\l"�"�BJ�Z
E�;/�[�pIɯ0�!͕����]�� �lT�      e   �   x��б
�0�ݯȦ�C^4V���A(���l��c����Bג�-���k��9��2z���e^Q�3$���]�Kӣ$&J��+@(&LZŝb۪����3�>j��3��
����]0������vVˠ<�)x���I�O*lGEK�!cB�������k�~�(z?C��      m   �  x����n�@�O1;5�:@����k�֍!����تO_$5)��	������|���?l=���=�pc���n��J�-�M�K���];	%$v�#�hcE�b�L��(YD��YY�<'�\D�){n�x(��e4i�ƭ!*)*�+s鬫�k �u�F`Л�pY�I����^/�����T���̉ʙV��ozF.��4�mX�]5��o��I��?\W�3�$��U��3�4�.��L,�.����/#ge#�p�p9%�g)��1��W��V��q��%q�0�ʇ<����G[�7UP�����n}��G񰯇��M�D�Ўq�4��qg��
h�e��	v4
h����yr ���Z|mqj�gIc���v�#��h:�l��h��7	t�      k   �  x���;o�0�w~�����GwB*�R��($Vq��C}��@x$�f��ձ����ڳ�r��B���嶐	��EY|.:��P.�,��H��Lm�j!���F�{��()D�D��asyJ�z�>'��t��E�[�+a��)�XϺfuM\�X��F$��#!��8��7�၁�8;K)�a�W���μg�J����S��D�<�1��`ך�a�Uр�t��0�T�k8l������?���t���"�����?��ςV� ��{aR�B��oȐW3h��F��̇N�l��;q8�z��W��:j�`��Q���a@ҝ$/a��n�h��K�g�J�g�d�k��!�TݽL�{�Fi�՘��=�\dk(߷Fc��]ڄ<u�[�mF�^�g�t      g   �  x�Ց�n�0��sB��Bp\b>���&K��QM��6����㴥w��؍�$T�6��?�r^�����'�������=j��0Mt!��DƤrБų6P�Y&����gi�7�(���䠍46��B79�δ�J���T[�MY�y&�f-�����6¬�>���f�G��/�j<[st1tP;��I0�{��.�kȯN��Y�-rjy�Ţm���8��&I�p5�=e�*9��}�e�R:�~�9�������*�V)L{�#}�����&J���0����S�R�m�@���jk�dN՗`��`�Zy0A���KD�eO�Xfn��1�&�G����^��~�4"ވ����O������p%V�\׳�'�	wW���]��S���,�I^����U��X�ߍ�=�Q7��ރ*k��L�P�[��ab�=0�̿蝟��>=x��T���v��I^^��~c����ӑGF�oP���/�\c     