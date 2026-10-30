/* MUBS Student Management System — shared prototype script.
 * Data is kept in the browser (localStorage) so the screens feel real
 * without a server. Replace Store with API calls when a backend is added.
 */
(function () {
    'use strict';

    /* ---------- Seed data ---------- */
    var SEED_STUDENTS = [
        { id: 'STU-1001', regNo: '23/U/0457', firstName: 'Aisha', lastName: 'Namuli', gender: 'Female', dob: '2004-03-12', email: 'aisha.namuli@students.mubs.ac.ug', phone: '0772 145 230', programme: 'Bachelor of Business Administration', year: '3', intake: '2023/24', status: 'Active', gpa: '4.32', feesBalance: '450000', guardian: 'Grace Namuli', guardianPhone: '0701 220 118', address: 'Nakawa, Kampala' },
        { id: 'STU-1002', regNo: '23/U/0512', firstName: 'Brian', lastName: 'Okello', gender: 'Male', dob: '2003-11-02', email: 'brian.okello@students.mubs.ac.ug', phone: '0758 300 412', programme: 'Bachelor of Commerce', year: '3', intake: '2023/24', status: 'Active', gpa: '3.88', feesBalance: '0', guardian: 'James Okello', guardianPhone: '0782 113 900', address: 'Ntinda, Kampala' },
        { id: 'STU-1003', regNo: '24/U/0108', firstName: 'Doreen', lastName: 'Atim', gender: 'Female', dob: '2005-06-21', email: 'doreen.atim@students.mubs.ac.ug', phone: '0789 412 006', programme: 'Bachelor of Science in Accounting', year: '2', intake: '2024/25', status: 'Active', gpa: '4.61', feesBalance: '1200000', guardian: 'Esther Atim', guardianPhone: '0772 900 001', address: 'Lira City' },
        { id: 'STU-1004', regNo: '22/U/0931', firstName: 'Kenneth', lastName: 'Mugisha', gender: 'Male', dob: '2002-01-30', email: 'kenneth.mugisha@students.mubs.ac.ug', phone: '0704 556 781', programme: 'Bachelor of Information Technology', year: '4', intake: '2022/23', status: 'Probation', gpa: '2.41', feesBalance: '890000', guardian: 'Robert Mugisha', guardianPhone: '0752 400 222', address: 'Mbarara' },
        { id: 'STU-1005', regNo: '24/U/0244', firstName: 'Sharon', lastName: 'Nakato', gender: 'Female', dob: '2005-09-14', email: 'sharon.nakato@students.mubs.ac.ug', phone: '0776 123 450', programme: 'Bachelor of Human Resource Management', year: '2', intake: '2024/25', status: 'Active', gpa: '3.95', feesBalance: '0', guardian: 'Mary Nakato', guardianPhone: '0700 789 654', address: 'Mukono' },
        { id: 'STU-1006', regNo: '25/U/0017', firstName: 'Ivan', lastName: 'Ssempijja', gender: 'Male', dob: '2006-02-08', email: 'ivan.ssempijja@students.mubs.ac.ug', phone: '0741 202 303', programme: 'Bachelor of Business Administration', year: '1', intake: '2025/26', status: 'Active', gpa: '3.40', feesBalance: '2100000', guardian: 'Paul Ssempijja', guardianPhone: '0772 111 222', address: 'Entebbe' },
        { id: 'STU-1007', regNo: '22/U/0480', firstName: 'Patience', lastName: 'Akello', gender: 'Female', dob: '2002-07-19', email: 'patience.akello@students.mubs.ac.ug', phone: '0783 909 112', programme: 'Bachelor of Commerce', year: '4', intake: '2022/23', status: 'Graduated', gpa: '4.12', feesBalance: '0', guardian: 'Ruth Akello', guardianPhone: '0701 333 444', address: 'Gulu City' },
        { id: 'STU-1008', regNo: '25/U/0063', firstName: 'Daniel', lastName: 'Kato', gender: 'Male', dob: '2006-12-01', email: 'daniel.kato@students.mubs.ac.ug', phone: '0759 765 432', programme: 'Bachelor of Information Technology', year: '1', intake: '2025/26', status: 'Active', gpa: '3.72', feesBalance: '650000', guardian: 'Sarah Kato', guardianPhone: '0772 654 321', address: 'Wakiso' },
        { id: 'STU-1009', regNo: '23/U/0799', firstName: 'Joan', lastName: 'Achieng', gender: 'Female', dob: '2004-04-27', email: 'joan.achieng@students.mubs.ac.ug', phone: '0708 222 909', programme: 'Bachelor of Science in Accounting', year: '3', intake: '2023/24', status: 'Suspended', gpa: '2.05', feesBalance: '1750000', guardian: 'Peter Achieng', guardianPhone: '0782 777 888', address: 'Tororo' },
        { id: 'STU-1010', regNo: '24/U/0390', firstName: 'Moses', lastName: 'Tumwine', gender: 'Male', dob: '2005-08-05', email: 'moses.tumwine@students.mubs.ac.ug', phone: '0774 818 919', programme: 'Bachelor of Human Resource Management', year: '2', intake: '2024/25', status: 'Active', gpa: '3.58', feesBalance: '300000', guardian: 'Annet Tumwine', guardianPhone: '0703 515 616', address: 'Kabale' }
    ];

    var KEY = 'mubs_sms_students_v1';

    var Store = {
        all: function () {
            try {
                var raw = JSON.parse(localStorage.getItem(KEY));
                if (Array.isArray(raw)) return raw;
            } catch (e) { /* fall through to seed */ }
            localStorage.setItem(KEY, JSON.stringify(SEED_STUDENTS));
            return SEED_STUDENTS.slice();
        },
        save: function (list) { localStorage.setItem(KEY, JSON.stringify(list)); },
        get: function (id) { return Store.all().find(function (s) { return s.id === id; }); },
        upsert: function (student) {
            var list = Store.all();
            var i = list.findIndex(function (s) { return s.id === student.id; });
            if (i >= 0) list[i] = student; else list.unshift(student);
            Store.save(list);
            return student;
        },
        remove: function (id) { Store.save(Store.all().filter(function (s) { return s.id !== id; })); },
        nextId: function () {
            var max = Store.all().reduce(function (m, s) { return Math.max(m, parseInt(String(s.id).replace(/\D/g, ''), 10) || 0); }, 1000);
            return 'STU-' + (max + 1);
        },
        reset: function () { localStorage.setItem(KEY, JSON.stringify(SEED_STUDENTS)); }
    };

    /* ---------- Helpers ---------- */
    function $(sel, root) { return (root || document).querySelector(sel); }
    function $all(sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); }
    function esc(v) { return String(v == null ? '' : v).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); }
    function ugx(n) { return 'UGX ' + Number(n || 0).toLocaleString('en-UG'); }
    function initials(s) { return ((s.firstName || ' ')[0] + (s.lastName || ' ')[0]).toUpperCase(); }
    function param(name) { return new URLSearchParams(window.location.search).get(name); }
    function icons() { if (window.lucide) window.lucide.createIcons(); }

    var STATUS_TONE = {
        Active: 'bg-emerald-50 text-emerald-700',
        Probation: 'bg-amber-50 text-[#d97706]',
        Suspended: 'bg-red-50 text-red-600',
        Graduated: 'bg-blue-50 text-[#2563eb]'
    };
    function statusBadge(status) {
        return '<span class="text-xs px-2 py-1 rounded-full ' + (STATUS_TONE[status] || 'bg-slate-100 text-slate-600') + '">' + esc(status) + '</span>';
    }

    function toast(message, type) {
        var old = $('.toast');
        if (old) old.remove();
        var el = document.createElement('div');
        el.className = 'toast ' + (type || 'success');
        var icon = type === 'error' ? 'alert-circle' : type === 'info' ? 'info' : 'check-circle-2';
        el.innerHTML = '<i data-lucide="' + icon + '" class="w-4 h-4 shrink-0"></i><span>' + esc(message) + '</span>';
        document.body.appendChild(el);
        icons();
        setTimeout(function () { el.remove(); }, 3200);
    }

    /* MUBS-style grading: total out of 100 */
    function grade(total) {
        var t = Number(total);
        if (isNaN(t)) return { letter: '—', point: '—' };
        if (t >= 80) return { letter: 'A', point: '5.0' };
        if (t >= 75) return { letter: 'B+', point: '4.5' };
        if (t >= 70) return { letter: 'B', point: '4.0' };
        if (t >= 65) return { letter: 'C+', point: '3.5' };
        if (t >= 60) return { letter: 'C', point: '3.0' };
        if (t >= 55) return { letter: 'D+', point: '2.5' };
        if (t >= 50) return { letter: 'D', point: '2.0' };
        return { letter: 'F', point: '0.0' };
    }

    /* ---------- Layout: sidebar, dropdowns, greeting ---------- */
    function initLayout() {
        var sidebar = $('#sidebar');
        var overlay = $('#sidebar-overlay');
        function close() { if (sidebar) sidebar.classList.add('-translate-x-full'); if (overlay) overlay.classList.add('hidden'); }
        $all('[data-sidebar-open]').forEach(function (b) {
            b.addEventListener('click', function () {
                if (!sidebar) return;
                sidebar.classList.remove('-translate-x-full');
                if (overlay) overlay.classList.remove('hidden');
            });
        });
        if (overlay) overlay.addEventListener('click', close);

        document.addEventListener('click', function (e) {
            $all('details.menu-dropdown[open]').forEach(function (d) { if (!d.contains(e.target)) d.removeAttribute('open'); });
        });

        $all('[data-greeting]').forEach(function (el) {
            var h = new Date().getHours();
            var part = h < 12 ? 'Good morning' : h < 17 ? 'Good afternoon' : 'Good evening';
            el.textContent = part + ', ' + el.getAttribute('data-greeting');
        });

        $all('[data-year]').forEach(function (el) { el.textContent = new Date().getFullYear(); });

        var mobileToggle = $('[data-mobile-nav]');
        if (mobileToggle) mobileToggle.addEventListener('click', function () { $('#mobile-nav').classList.toggle('hidden'); });
    }

    /* ---------- Generic table search & filter ---------- */
    function initTableFilters() {
        var tables = {};
        $all('[data-table-search],[data-table-filter]').forEach(function (el) {
            var id = el.getAttribute('data-table-search') || el.getAttribute('data-table-filter');
            (tables[id] = tables[id] || []).push(el);
        });
        Object.keys(tables).forEach(function (id) {
            var table = document.getElementById(id);
            if (!table) return;
            var controls = tables[id];
            var empty = document.querySelector('[data-table-empty="' + id + '"]');
            function apply() {
                var shown = 0;
                $all('tbody tr', table).forEach(function (row) {
                    var ok = controls.every(function (c) {
                        var v = (c.value || '').trim().toLowerCase();
                        if (!v) return true;
                        if (c.hasAttribute('data-table-search')) return row.textContent.toLowerCase().indexOf(v) >= 0;
                        var cell = row.children[parseInt(c.getAttribute('data-col'), 10)];
                        return cell && cell.textContent.trim().toLowerCase() === v;
                    });
                    row.classList.toggle('hidden', !ok);
                    if (ok) shown++;
                });
                if (empty) empty.classList.toggle('hidden', shown > 0);
            }
            controls.forEach(function (c) { c.addEventListener('input', apply); c.addEventListener('change', apply); });
        });
    }

    /* ---------- Students: list ---------- */
    function initStudentsTable() {
        var tbody = $('[data-students-table]');
        if (!tbody) return;
        var form = $('[data-students-filters]');
        var count = $('[data-students-count]');
        var empty = $('[data-students-empty]');

        function render() {
            var q = form ? form.q.value.trim().toLowerCase() : '';
            var prog = form ? form.programme.value : '';
            var status = form ? form.status.value : '';
            var list = Store.all().filter(function (s) {
                var hay = [s.firstName, s.lastName, s.regNo, s.email, s.programme].join(' ').toLowerCase();
                return (!q || hay.indexOf(q) >= 0) && (!prog || s.programme === prog) && (!status || s.status === status);
            });
            tbody.innerHTML = list.map(function (s) {
                return '<tr class="border-b border-slate-100 hover:bg-slate-50">' +
                    '<td class="py-3 px-4"><div class="flex items-center gap-3"><div class="w-9 h-9 rounded-full bg-blue-50 border border-blue-100 text-[#2563eb] text-xs font-semibold flex items-center justify-center">' + esc(initials(s)) + '</div>' +
                    '<div><p class="text-sm font-medium text-slate-900">' + esc(s.firstName + ' ' + s.lastName) + '</p><p class="text-xs text-slate-500">' + esc(s.email) + '</p></div></div></td>' +
                    '<td class="py-3 px-4 text-sm text-slate-500 whitespace-nowrap">' + esc(s.regNo) + '</td>' +
                    '<td class="py-3 px-4 text-sm text-slate-600">' + esc(s.programme) + '</td>' +
                    '<td class="py-3 px-4 text-sm text-slate-600 text-center">' + esc(s.year) + '</td>' +
                    '<td class="py-3 px-4 text-sm font-medium text-center">' + esc(s.gpa) + '</td>' +
                    '<td class="py-3 px-4">' + statusBadge(s.status) + '</td>' +
                    '<td class="py-3 px-4 text-center whitespace-nowrap">' +
                    '<a href="show.html?id=' + encodeURIComponent(s.id) + '" class="inline-flex p-1.5 rounded-lg text-[#2563eb] hover:bg-blue-50" title="View"><i data-lucide="eye" class="w-4 h-4"></i></a>' +
                    '<a href="edit.html?id=' + encodeURIComponent(s.id) + '" class="inline-flex p-1.5 rounded-lg text-[#d97706] hover:bg-amber-50" title="Edit"><i data-lucide="pencil" class="w-4 h-4"></i></a>' +
                    '<button type="button" data-delete-id="' + esc(s.id) + '" class="inline-flex p-1.5 rounded-lg text-red-500 hover:bg-red-50" title="Delete"><i data-lucide="trash-2" class="w-4 h-4"></i></button>' +
                    '</td></tr>';
            }).join('');
            if (count) count.textContent = list.length + (list.length === 1 ? ' student' : ' students');
            if (empty) empty.classList.toggle('hidden', list.length > 0);
            icons();
        }

        tbody.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-delete-id]');
            if (!btn) return;
            var s = Store.get(btn.getAttribute('data-delete-id'));
            if (s && confirm('Remove ' + s.firstName + ' ' + s.lastName + ' from the register?')) {
                Store.remove(s.id);
                render();
                toast('Student record removed');
            }
        });
        if (form) {
            form.addEventListener('input', render);
            form.addEventListener('change', render);
            form.addEventListener('submit', function (e) { e.preventDefault(); render(); });
        }
        var reset = $('[data-reset-students]');
        if (reset) reset.addEventListener('click', function () { Store.reset(); render(); toast('Sample records restored', 'info'); });
        render();
    }

    /* ---------- Students: create / edit ---------- */
    function initStudentForm() {
        var form = $('[data-student-form]');
        if (!form) return;
        var mode = form.getAttribute('data-student-form');
        var existing = null;
        if (mode === 'edit') {
            existing = Store.get(param('id')) || Store.all()[0];
            if (!existing) return;
            Object.keys(existing).forEach(function (k) { if (form.elements[k]) form.elements[k].value = existing[k]; });
            $all('[data-edit-name]').forEach(function (el) { el.textContent = existing.firstName + ' ' + existing.lastName; });
            $all('[data-edit-back]').forEach(function (el) { el.href = 'show.html?id=' + encodeURIComponent(existing.id); });
        }
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var missing = $all('[required]', form).filter(function (f) { return !String(f.value).trim(); });
            $all('[required]', form).forEach(function (f) { f.classList.toggle('!border-red-400', missing.indexOf(f) >= 0); });
            if (missing.length) { toast('Please fill in all required fields', 'error'); missing[0].focus(); return; }
            var regNo = form.elements.regNo.value.trim();
            var clash = Store.all().find(function (s) { return s.regNo === regNo && (!existing || s.id !== existing.id); });
            if (clash) { toast('Registration number ' + regNo + ' is already in use', 'error'); form.elements.regNo.focus(); return; }
            var data = existing ? Object.assign({}, existing) : { id: Store.nextId(), gpa: '0.00' };
            $all('input,select,textarea', form).forEach(function (f) { if (f.name) data[f.name] = f.value.trim(); });
            Store.upsert(data);
            toast(existing ? 'Changes saved' : 'Student registered');
            setTimeout(function () { window.location.href = 'show.html?id=' + encodeURIComponent(data.id); }, 700);
        });
    }

    /* ---------- Students: profile ---------- */
    function initStudentShow() {
        var root = $('[data-student-show]');
        if (!root) return;
        var s = Store.get(param('id')) || Store.all()[0];
        if (!s) { root.innerHTML = '<p class="text-slate-500">Student not found.</p>'; return; }
        var values = {
            name: s.firstName + ' ' + s.lastName, initials: initials(s), regNo: s.regNo, email: s.email, phone: s.phone,
            programme: s.programme, year: 'Year ' + s.year, intake: s.intake, gender: s.gender, dob: s.dob, gpa: s.gpa,
            feesBalance: ugx(s.feesBalance), guardian: s.guardian, guardianPhone: s.guardianPhone, address: s.address
        };
        $all('[data-field]', root).forEach(function (el) { el.textContent = values[el.getAttribute('data-field')] || '—'; });
        $all('[data-field-status]', root).forEach(function (el) { el.innerHTML = statusBadge(s.status); });
        $all('[data-edit-link]', root).forEach(function (el) { el.href = 'edit.html?id=' + encodeURIComponent(s.id); });
        var del = $('[data-delete-student]', root);
        if (del) del.addEventListener('click', function () {
            if (confirm('Remove ' + values.name + ' from the register?')) {
                Store.remove(s.id);
                toast('Student record removed');
                setTimeout(function () { window.location.href = 'index.html'; }, 600);
            }
        });
        var gpaBar = $('[data-gpa-bar]', root);
        if (gpaBar) gpaBar.style.width = Math.min(100, (Number(s.gpa) / 5) * 100) + '%';
    }

    /* ---------- Admin dashboard & reports ---------- */
    function initAdminStats() {
        if (!$('[data-stat]') && !$('[data-programme-bars]') && !$('[data-recent-students]')) return;
        var list = Store.all();
        var stats = {
            total: list.length,
            active: list.filter(function (s) { return s.status === 'Active'; }).length,
            probation: list.filter(function (s) { return s.status === 'Probation' || s.status === 'Suspended'; }).length,
            defaulters: list.filter(function (s) { return Number(s.feesBalance) > 0 && s.status !== 'Graduated'; }).length,
            graduated: list.filter(function (s) { return s.status === 'Graduated'; }).length,
            avgGpa: list.length ? (list.reduce(function (t, s) { return t + Number(s.gpa || 0); }, 0) / list.length).toFixed(2) : '0.00',
            outstanding: ugx(list.reduce(function (t, s) { return t + Number(s.feesBalance || 0); }, 0))
        };
        $all('[data-stat]').forEach(function (el) { el.textContent = stats[el.getAttribute('data-stat')]; });

        var bars = $('[data-programme-bars]');
        if (bars) {
            var groups = {};
            list.forEach(function (s) { groups[s.programme] = (groups[s.programme] || 0) + 1; });
            var max = Math.max.apply(null, Object.values(groups).concat([1]));
            bars.innerHTML = Object.keys(groups).sort(function (a, b) { return groups[b] - groups[a]; }).map(function (p, i) {
                return '<div><div class="flex justify-between text-sm mb-1.5"><span class="text-slate-600">' + esc(p.replace('Bachelor of ', 'B. ')) + '</span><span class="font-semibold">' + groups[p] + '</span></div>' +
                    '<div class="bar-track"><div class="bar-fill' + (i % 2 ? ' gold' : '') + '" style="width:' + (groups[p] / max * 100) + '%"></div></div></div>';
            }).join('');
        }

        var recent = $('[data-recent-students]');
        if (recent) {
            recent.innerHTML = list.slice(0, 5).map(function (s) {
                return '<a href="students/show.html?id=' + encodeURIComponent(s.id) + '" class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 hover:border-[#2563eb]/40 hover:bg-slate-50">' +
                    '<div class="w-9 h-9 rounded-full bg-blue-50 border border-blue-100 text-[#2563eb] text-xs font-semibold flex items-center justify-center">' + esc(initials(s)) + '</div>' +
                    '<div class="flex-1 min-w-0"><p class="text-sm font-medium truncate">' + esc(s.firstName + ' ' + s.lastName) + '</p><p class="text-xs text-slate-500 truncate">' + esc(s.regNo) + ' · ' + esc(s.programme) + '</p></div>' +
                    statusBadge(s.status) + '</a>';
            }).join('');
        }

        var defaulters = $('[data-defaulters-table]');
        if (defaulters) {
            var rows = list.filter(function (s) { return Number(s.feesBalance) > 0 && s.status !== 'Graduated'; })
                .sort(function (a, b) { return Number(b.feesBalance) - Number(a.feesBalance); });
            defaulters.innerHTML = rows.map(function (s) {
                return '<tr class="border-b border-slate-100"><td class="py-3 px-4 text-sm font-medium">' + esc(s.firstName + ' ' + s.lastName) + '</td><td class="py-3 px-4 text-sm text-slate-500">' + esc(s.regNo) + '</td><td class="py-3 px-4 text-sm text-slate-500">Year ' + esc(s.year) + '</td><td class="py-3 px-4 text-sm font-semibold text-red-600 text-right">' + ugx(s.feesBalance) + '</td></tr>';
            }).join('') || '<tr><td colspan="4" class="py-6 text-center text-sm text-slate-500">No outstanding balances.</td></tr>';
        }
    }

    function initExport() {
        $all('[data-export-students]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var cols = ['regNo', 'firstName', 'lastName', 'gender', 'email', 'phone', 'programme', 'year', 'intake', 'status', 'gpa', 'feesBalance'];
                var csv = [cols.join(',')].concat(Store.all().map(function (s) {
                    return cols.map(function (c) { return '"' + String(s[c] == null ? '' : s[c]).replace(/"/g, '""') + '"'; }).join(',');
                })).join('\n');
                var a = document.createElement('a');
                a.href = URL.createObjectURL(new Blob([csv], { type: 'text/csv' }));
                a.download = 'mubs-students.csv';
                a.click();
                toast('Student list downloaded');
            });
        });
    }

    /* ---------- Lecturer: attendance ---------- */
    function initAttendance() {
        var table = $('[data-attendance]');
        if (!table) return;
        function summary() {
            var counts = { present: 0, late: 0, absent: 0 };
            $all('tr[data-att-row]', table).forEach(function (r) { var v = r.getAttribute('data-value'); if (counts[v] !== undefined) counts[v]++; });
            Object.keys(counts).forEach(function (k) { $all('[data-att-count="' + k + '"]').forEach(function (el) { el.textContent = counts[k]; }); });
        }
        function set(row, value) {
            row.setAttribute('data-value', value);
            $all('.att-btn', row).forEach(function (b) {
                b.classList.remove('is-present', 'is-late', 'is-absent');
                if (b.getAttribute('data-att') === value) b.classList.add('is-' + value);
            });
        }
        $all('tr[data-att-row]', table).forEach(function (row) { set(row, row.getAttribute('data-value') || 'present'); });
        table.addEventListener('click', function (e) {
            var b = e.target.closest('.att-btn');
            if (!b) return;
            set(b.closest('tr'), b.getAttribute('data-att'));
            summary();
        });
        var all = $('[data-att-all]');
        if (all) all.addEventListener('click', function () { $all('tr[data-att-row]', table).forEach(function (r) { set(r, 'present'); }); summary(); });
        var save = $('[data-att-save]');
        if (save) save.addEventListener('click', function () {
            var course = $('[data-att-course]');
            toast('Attendance saved for ' + (course ? course.value : 'this class'));
        });
        summary();
    }

    /* ---------- Lecturer: marks entry ---------- */
    function initMarks() {
        var table = $('[data-marks]');
        if (!table) return;
        function update(row) {
            var ca = $('[data-mark="ca"]', row), ex = $('[data-mark="exam"]', row);
            var caV = ca.value === '' ? null : Number(ca.value);
            var exV = ex.value === '' ? null : Number(ex.value);
            ca.classList.toggle('is-invalid', caV !== null && (caV < 0 || caV > 30));
            ex.classList.toggle('is-invalid', exV !== null && (exV < 0 || exV > 70));
            var total = (caV === null || exV === null) ? null : caV + exV;
            var g = total === null ? { letter: '—', point: '—' } : grade(total);
            $('[data-mark-total]', row).textContent = total === null ? '—' : total;
            var gEl = $('[data-mark-grade]', row);
            gEl.textContent = g.letter;
            gEl.className = 'text-xs font-semibold px-2 py-1 rounded-full ' + (g.letter === 'F' ? 'bg-red-50 text-red-600' : g.letter === '—' ? 'bg-slate-100 text-slate-500' : g.letter.indexOf('A') === 0 ? 'bg-emerald-50 text-emerald-700' : 'bg-blue-50 text-[#2563eb]');
        }
        function stats() {
            var totals = $all('[data-mark-total]', table).map(function (c) { return Number(c.textContent); }).filter(function (n) { return !isNaN(n); });
            var avg = totals.length ? (totals.reduce(function (a, b) { return a + b; }, 0) / totals.length).toFixed(1) : '—';
            var pass = totals.filter(function (n) { return n >= 50; }).length;
            $all('[data-marks-avg]').forEach(function (el) { el.textContent = avg; });
            $all('[data-marks-pass]').forEach(function (el) { el.textContent = totals.length ? Math.round(pass / totals.length * 100) + '%' : '—'; });
            $all('[data-marks-entered]').forEach(function (el) { el.textContent = totals.length; });
        }
        $all('tr[data-mark-row]', table).forEach(update);
        stats();
        table.addEventListener('input', function (e) { var row = e.target.closest('tr[data-mark-row]'); if (row) { update(row); stats(); } });
        $all('[data-marks-save]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                if ($('.is-invalid', table)) { toast('Some marks are out of range (CA max 30, Exam max 70)', 'error'); return; }
                toast(btn.getAttribute('data-marks-save') === 'submit' ? 'Marks submitted to the Registry for approval' : 'Draft saved');
            });
        });
    }

    /* ---------- Fees ---------- */
    function initFees() {
        $all('[data-prn]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var amount = $('[data-prn-amount]');
                var value = amount ? Number(String(amount.value).replace(/\D/g, '')) : 0;
                if (!value) { toast('Enter the amount you want to pay', 'error'); return; }
                var prn = '2260' + Math.floor(100000000 + Math.random() * 899999999);
                var out = $('[data-prn-output]');
                if (out) {
                    out.classList.remove('hidden');
                    $('[data-prn-number]', out).textContent = prn;
                    $('[data-prn-value]', out).textContent = ugx(value);
                }
                toast('Payment reference created');
            });
        });
    }

    /* ---------- Simple forms (login, register, contact, profile…) ---------- */
    function initDemoForms() {
        $all('form[data-demo-form]').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var pw = form.querySelector('[name="password"]'), confirmPw = form.querySelector('[name="password_confirmation"]');
                if (pw && confirmPw && pw.value !== confirmPw.value) { toast('Passwords do not match', 'error'); confirmPw.focus(); return; }
                toast(form.getAttribute('data-demo-form') || 'Saved');
                var to = form.getAttribute('data-redirect');
                if (to) setTimeout(function () { window.location.href = to; }, 800);
                else if (form.hasAttribute('data-reset')) form.reset();
            });
        });

        var login = $('form[data-login]');
        if (login) {
            $all('[data-role-option]', login).forEach(function (opt) {
                opt.addEventListener('click', function () {
                    $all('[data-role-option]', login).forEach(function (o) { o.classList.remove('border-[#2563eb]', 'bg-blue-50', 'text-[#2563eb]'); });
                    opt.classList.add('border-[#2563eb]', 'bg-blue-50', 'text-[#2563eb]');
                    login.elements.role.value = opt.getAttribute('data-role-option');
                });
            });
            login.addEventListener('submit', function (e) {
                e.preventDefault();
                toast('Demo sign-in complete. Returning to home…');
                setTimeout(function () {
                    window.location.href = login.getAttribute('data-success-url');
                }, 600);
            });
        }

        $all('[data-mark-read]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                $all('[data-unread]').forEach(function (el) { el.removeAttribute('data-unread'); el.classList.remove('bg-blue-50/40'); var dot = el.querySelector('[data-dot]'); if (dot) dot.remove(); });
                $all('[data-unread-count]').forEach(function (el) { el.textContent = '0'; });
                toast('All notifications marked as read');
            });
        });

        $all('[data-register-unit]').forEach(function (cb) {
            cb.addEventListener('change', function () {
                var total = $all('[data-register-unit]:checked').reduce(function (t, c) { return t + Number(c.getAttribute('data-credits')); }, 0);
                $all('[data-credit-total]').forEach(function (el) { el.textContent = total; });
                var warn = $('[data-credit-warning]');
                if (warn) warn.classList.toggle('hidden', total <= 24);
            });
        });
    }

    window.SMS = { Store: Store, toast: toast, grade: grade };

    document.addEventListener('DOMContentLoaded', function () {
        initLayout();
        initTableFilters();
        initStudentsTable();
        initStudentForm();
        initStudentShow();
        initAdminStats();
        initExport();
        initAttendance();
        initMarks();
        initFees();
        initDemoForms();
        icons();
    });
})();
